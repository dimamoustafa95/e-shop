<?php

namespace App\Http\Controllers\Frontend;

use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use App\Rating;
use App\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    public function index(){
        $pro=Product::query()->where('trending','1')->take(5)->get();
        $cate=Category::query()->where('popular','1')->take(3)->get();
        return view('frontend.index',compact('pro','cate'));
    }
    public function category(){

        $category=Category::query()->where('status','0')->get();
        return view('frontend.category',compact('category'));
    }
    public function viewCategory($slug){

        if(Category::query()->where('slug',$slug)->exists())
        {
            $category=Category::query()->where('slug',$slug)->first();
            $product=Product::query()->where('cate_id',$category->id)->where('status','0')->get();
            return view('frontend.products.index',compact('category','product'));
        }
        else{

            return redirect('/')->with('status',"slug does not exists");
        }
    }
    public function viewProduct($cate_slug,$pro_slug)
    {

        if(Category::query()->where('slug',$cate_slug)->exists()) {
            if(Product::query()->where('slug',$pro_slug)->exists()){
                $product = Product::query()->where('slug',$pro_slug)->first();
                $rating = Rating::query()->where('prod_id',$product->id)->get();
                $rating_sum = Rating::query()->where('prod_id',$product->id)->sum('stars_rated');
                $user_rating = Rating::query()->where('prod_id',$product->id)->where('user_id',Auth::id())->first();
                $reviews = Review::query()->where('prod_id',$product->id)->get();
                if($rating->count()>0){
                    $rating_value = $rating_sum/$rating->count();
                }
                else{
                    $rating_value=0;
                }

                return view('frontend.products.view',compact('product','rating','reviews','rating_value','user_rating'));
            }
            else{
                return redirect('/')->with('status',"the link was broken");
            }
        }
        else{
                return redirect('/')->with('status',"no such category found");
            }

    }


    public function productListAjax(){

        $products = Product::query()->select('name')->where('status','0')->get();
        $data = [];
        foreach ($products as $item){
            $data[] = $item['name'];
        }
        return $data;
    }

    public function searchProduct(Request $request){

        $searched_products = $request->product_name;

        if($searched_products != ""){

            $product = Product::query()->where("name","LIKE","%$searched_products%")->first();
            if($product){

                return redirect('category/'.$product->category->slug.'/'.$product->slug);
            }
            else{

                return redirect()->back()->with("status","No Product matched your search");
            }
        }
        else{
            return redirect()->back();
        }


    }
}
