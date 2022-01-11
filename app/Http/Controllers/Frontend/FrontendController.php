<?php

namespace App\Http\Controllers\Frontend;

use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

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
                $product=Product::query()->where('slug',$pro_slug)->first();
                return view('frontend.products.view',compact('product'));
            }
            else{
                return redirect('/')->with('status',"the link was broken");
            }
        }
        else{
            return redirect('/')->with('status',"no such category found");
        }

        }


}
