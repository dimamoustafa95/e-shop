<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Order;
use App\Product;
use App\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    public function add(Request $request)
    {
      $stars_rated = $request->input('product_rating');
      $product_id = $request->input('product_id');

      $product_check = Product::query()->where('id',$product_id)->where('status','0')->first();
      if($product_check){

          $verified_purchase = Order::query()->where('orders.user_id',Auth::id())
              ->join('order_items','order_id','order_items.order_id')
              ->where('order_items.prod_id',$product_id)->get();

          if($verified_purchase->count()>0){

              $existing_rating = Rating::query()->where('user_id',Auth::id())->where('prod_id',$product_id)->first();
              if($existing_rating){

                  $existing_rating->stars_rated = $stars_rated;
                  $existing_rating->update();
              }
              else{

              Rating::create([
                  'user_id'=>Auth::id(),
                  'prod_id'=>$product_id,
                  'stars_rated'=>$stars_rated,
              ]);
              }
              return redirect()->back()->with('status',"Thank you for rating this product");
          }
          else{
              return redirect()->back()->with('status',"You cannot rate a product without purchase");
          }
      }
      else{
          return redirect()->back()->with('status',"the link you followed was broken");
          }
    }
}
