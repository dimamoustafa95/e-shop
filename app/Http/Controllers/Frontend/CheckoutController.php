<?php

namespace App\Http\Controllers\Frontend;

use App\Cart;
use App\Http\Controllers\Controller;
use App\Order;
use App\OrderItem;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index(){

        $old_cartItem=Cart::query()->where('user_id',Auth::id())->get();
        foreach($old_cartItem as $item) {
            if (!Product::query()->where('id', $item->prod_id)->where('qty', '>=', $item->prod_qty)->exists()) {

                $removeItem = Cart::query()->where('user_id', Auth::id())->where('prod_id', $item->prod_id)->first();
                $removeItem->delete();
            }
        }
            $cartItem=Cart::query()->where('user_id',Auth::id())->get();

        return view('frontend.checkout',compact('cartItem'));
    }

    public function placeOrder(Request $request){

        $order = new Order();
        $order->user_id = Auth::id();
        $order->f_name = $request->input('f_name');
        $order->l_name = $request->input('l_name');
        $order->email = $request->input('email');
        $order->phone = $request->input('phone');
        $order->address_1 = $request->input('address_1');
        $order->address_2 = $request->input('address_2');
        $order->city = $request->input('city');
        $order->state = $request->input('state');
        $order->country = $request->input('country');
        $order->pin_code = $request->input('pin_code');
        $order->payment_mode = $request->input('payment_mode');
        $order->payment_id = $request->input('payment_id');

        //to calculate the total price
        $total=0;
        $cartItem_total=Cart::query()->where('user_id',Auth::id())->get();
        foreach ($cartItem_total as $prod){
            $total += $prod->products->selling_price;
        }
        $order->total_price=$total;
        $order->tracking_no = 'item'.rand(1111,9999);
        $order->save();

        $cartItem=Cart::query()->where('user_id',Auth::id())->get();
        foreach ($cartItem as $item){
            OrderItem::create([
                'order_id'=> $order->id,
                'prod_id'=>$item->prod_id,
                'qty'=>$item->prod_qty,
                'price'=>$item->products->selling_price,
            ]);
            $prod = Product::query()->where('id',$item->prod_id)->first();
            $prod->qty = $prod->qty - $item ->prod_qty;
            $prod->update();
        }

        if (Auth::user()->address_1 == NULL){
            $user = User::query()->where('id',Auth::id())->first();
            $user->name = $request->input('f_name');
            $user->l_name = $request->input('l_name');
            $user->phone = $request->input('phone');
            $user->address_1 = $request->input('address_1');
            $user->address_2 = $request->input('address_2');
            $user->city = $request->input('city');
            $user->state = $request->input('state');
            $user->country = $request->input('country');
            $user->pin_code = $request->input('pin_code');
            $user->update();
        }
        Cart::query()->where('user_id',Auth::id())->delete();

         if($request->input('payment_mode') =="Paid by Razorpay"){

             return response()->json(['status'=>"order placed successfully"]);
         }
        return redirect('/')->with('status',"order placed successfully");
    }

    public function razorPayCheck(Request $request)
    {

        $cartItem = Cart::query()->where('user_id', Auth::id())->get();
        $total_price = 0;
        foreach ($cartItem as $item) {
            $total_price += $item->products->selling_price * $item->prod_qty;
        }
        $firstName = $request->input('firstName');
        $lastName = $request->input('lastName');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $address1 = $request->input('address1');
        $address2 = $request->input('address2');
        $city = $request->input('city');
        $state = $request->input('state');
        $country = $request->input('country');
        $pincode = $request->input('pincode');

        return response()->json([
            'firstName' => $firstName,
            'lastName' => $lastName,
            'email' => $email,
            'phone' => $phone,
            'address1' => $address1,
            'address2' => $address2,
            'city'=>$city,
            'state'=>$state,
            'country'=>$country,
            'pincode'=>$pincode,
            'total_price'=>$total_price
    ]);
}
}
