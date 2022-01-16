<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Product;
use App\WishList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishListController extends Controller
{

    public function viewWishList(){

        $wishlist = WishList::query()->where('user_id',Auth::id())->get();
        return view('frontend.wishList',compact('wishlist'));
    }

    public function add(Request $request){

        if (Auth::check()) {
            $prod_id = $request->input('product_id');

            if(Product::find($prod_id)){

                $wish =new WishList();
                $wish->prod_id= $prod_id;
                $wish->user_id= Auth::id();
                $wish->save();
                return response()->json(['status' => "Product added to wishlist successfully"]);
            }
            else{
                return response()->json(['status' => "Product does not exist"]);
            }
        }
        else{
            return response()->json(['status' => "login to continue"]);
        }
    }
    public function deleteItem(Request $request)
    {

        if (Auth::check()) {
            $prod_id = $request->input('prod_id');
            if (WishList::query()->where('prod_id', $prod_id)->where('user_id', Auth::id())->exists()) {
                $wish = WishList::query()->where('prod_id', $prod_id)->where('user_id', Auth::id())->first();
                $wish->delete();
                return response()->json(['status' => "Item Removed Successfully"]);
            }
        } else {

//            return response()->json(['status' => "login to continue"]);
//        }
            return view('frontend.cart', compact('wish'));
        }
    }
}
