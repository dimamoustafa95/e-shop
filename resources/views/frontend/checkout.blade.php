@extends('layouts.front')

@section('title')
   Checkout
@endsection
@section('content')
    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <h6 class="mb-0">
                <a href="{{url('/')}}">Home</a> /
                <a href="{{url('checkout')}}">Checkout</a>

            </h6>
        </div>
    </div>
    <div class="container mt-3">
        <form action="{{url('place-order')}}" method="post">
            {{csrf_field()}}
        <div class="row">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-body">
                        <h6>Basic Details</h6>
                        <hr>
                        <div class="row checkout-form">
                            <div class="col-md-6">
                                <label for="firstName">First Name</label>
                                <input type="text" class="form-control firstName" value="{{\Illuminate\Support\Facades\Auth::user()->name}}" name="f_name" placeholder="Enter First Name">
                                <span id="fname_error" class="text-danger"></span>
                            </div>
                            <div class="col-md-6">
                                <label for="lastName">Last Name</label>
                                <input type="text" class="form-control lastName" value="{{\Illuminate\Support\Facades\Auth::user()->l_name}}" name="l_name" placeholder="Enter Last Name">
                                <span id="lname_error" class="text-danger"></span>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="email">Email</label>
                                <input type="text" class="form-control email" value="{{\Illuminate\Support\Facades\Auth::user()->email}}" name="email" placeholder="Enter Email">
                                <span id="email_error" class="text-danger"></span>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="phoneNumber">Phone Number</label>
                                <input type="text" class="form-control phone" value="{{\Illuminate\Support\Facades\Auth::user()->phone}}" name="phone" placeholder="Enter Phone Number">
                                <span id="phone_error" class="text-danger"></span>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="address1">Address 1</label>
                                <input type="text" class="form-control address1" value="{{\Illuminate\Support\Facades\Auth::user()->address_1}}" name="address_1" placeholder="Enter Address 1">
                                <span id="address1_error" class="text-danger"></span>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="address2">Address 2</label>
                                <input type="text" class="form-control address2" value="{{\Illuminate\Support\Facades\Auth::user()->address_2}}" name="address_2" placeholder="Enter Address 2">
                                <span id="address2_error" class="text-danger"></span>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="city">City</label>
                                <input type="text" class="form-control city" value="{{\Illuminate\Support\Facades\Auth::user()->city}}" name="city" placeholder="Enter City">
                                <span id="city_error" class="text-danger"></span>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="state">State</label>
                                <input type="text" class="form-control state" value="{{\Illuminate\Support\Facades\Auth::user()->state}}" name="state" placeholder="Enter State">
                                <span id="state_error" class="text-danger"></span>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="country">Country</label>
                                <input type="text" class="form-control country"  value="{{\Illuminate\Support\Facades\Auth::user()->country}}" name="country" placeholder="Enter Country">
                                <span id="country_error" class="text-danger"></span>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="pinCode">Pin Code</label>
                                <input type="text" class="form-control pincode" value="{{\Illuminate\Support\Facades\Auth::user()->pin_code}}" name="pin_code" placeholder="Enter Pin Code">
                                <span id="pincode_error" class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        <h6>Order Details</h6>
                        <hr>
                        <table class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Quantity</th>
                                <th>Price</th>
                            </tr>
                            </thead>
                            <tbody>
                        @foreach($cartItem as $cart)
                            <tr>
                            <td>{{$cart->products->name}}</td>
                                <td>{{$cart->prod_qty}}</td>
                                <td>{{$cart->products->selling_price}}</td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <hr>
                        <button type="submit" class="btn btn-success float-end w-100">place order | COD</button>
                        <button type="button" class="btn btn-primary w-100 mt-3 razorpay-btn">Pay with Razorpay</button>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
@endsection