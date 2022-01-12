<?php

namespace App\Http\Controllers\Frontend;

use App\Cart;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index(){

        $old_cartItem=Cart::query()->where('user_id',Auth::id())->get();
        foreach($old_cartItem as $item){
            if(!Product::query()->where('id',$item->prod_id)->where('qty','>=',$item->prod_qty)->exists()){

                $removeItem = Cart::query()->where('user_id',Auth::id())->where('prod_id',$item->prod_id)->first();
                $removeItem->delete();
            }
            $cartItem=Cart::query()->where('user_id',Auth::id())->get();
        }
        return view('frontend.checkout',compact('cartItem'));
    }
}
