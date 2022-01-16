<?php

namespace App\Http\Controllers\Frontend;

use App\Cart;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    public function addProduct(Request $request)
    {

        $product_id = $request->input('product_id');
        $product_qty = $request->input('product_qty');

        if (Auth::check()) {

            $product_check = Product::query()->where('id', $product_id)->first();
            if ($product_check) {


                if (Cart::query()->where('prod_id', $product_id)->where('user_id', Auth::id())->exists()) {

                    return response()->json(['status' => $product_check->name . "Already Added to cart"]);
                } else {
                    $cartItem = new Cart();
                    $cartItem->prod_id = $product_id;
                    $cartItem->user_id = Auth::id();
                    $cartItem->prod_qty = $product_qty;
                    $cartItem->save();
                    return response()->json(['status' => $product_check->name . "Added to cart"]);
                }
            }
        } else {

            return response()->json(['status' => "login to continue"]);
        }
    }


    public function viewCart()
    {

        $cartData = Cart::query()->where('user_id',Auth::id())->get();
        return view('frontend.cart',compact('cartData'));
    }
    public function deleteProduct(Request $request)
    {

        if (Auth::check()) {
            $prod_id = $request->input('prod_id');
            if(Cart::query()->where('prod_id',$prod_id)->where('user_id',Auth::id())->exists()){
                $cartItem=Cart::query()->where('prod_id',$prod_id)->where('user_id',Auth::id())->first();
                $cartItem->delete();
                return response()->json(['status' => "Product Deleted Successfully"]);
            }
        }
        else {

            return response()->json(['status' => "login to continue"]);
        }
        return view('frontend.cart',compact('cartData'));
    }
    public function updateCart(Request $request)
    {
        $prod_id = $request->input('prod_id');
        $product_qty = $request->input('prod_qty');
        if (Auth::check()) {
            if(Cart::query()->where('prod_id',$prod_id)->where('user_id',Auth::id())->exists()){
                $cart =Cart::query()->where('prod_id',$prod_id)->where('user_id',Auth::id())->first();
                $cart ->prod_qty =$product_qty;
                $cart ->update();
                return response()->json(['status' => "Quantity Updated"]);
            }
        }
    }
    public function cartCount(){

        $cartCount=Cart::query()->where('user_id',Auth::id())->count();
        return response()->json(['count'=>$cartCount]);
    }
}