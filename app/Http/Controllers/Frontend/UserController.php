<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $orders =Order::query()->where('user_id',Auth::id())->get();
        return view('frontend.orders.index',compact('orders'));
    }
    public function view($id)
    {
        $orders =Order::query()->where('id',$id)->where('user_id',Auth::id())->first();
        return view('frontend.orders.view',compact('orders'));
    }
}
