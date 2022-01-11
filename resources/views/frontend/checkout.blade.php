@extends('layouts.front')

@section('title')
   Checkout
@endsection
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-body">
                        <h6>Basic Details</h6>
                        <hr>
                        <div class="row checkout-form">
                            <div class="col-md-6">
                                <label for="firstName">First Name</label>
                                <input type="text" class="form-control" placeholder="Enter First Name">
                            </div>
                            <div class="col-md-6">
                                <label for="lastName">Last Name</label>
                                <input type="text" class="form-control" placeholder="Enter Last Name">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" placeholder="Enter Email">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="phoneNumber">Phone Number</label>
                                <input type="text" class="form-control" placeholder="Enter Phone Number">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="address1">Address 1</label>
                                <input type="text" class="form-control" placeholder="Enter Address 1">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="address2">Address 2</label>
                                <input type="text" class="form-control" placeholder="Enter Address 2">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="city">City</label>
                                <input type="text" class="form-control" placeholder="Enter City">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="state">State</label>
                                <input type="text" class="form-control" placeholder="Enter State">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="country">Country</label>
                                <input type="text" class="form-control" placeholder="Enter Country">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="pinCode">Pin Code</label>
                                <input type="text" class="form-control" placeholder="Enter Pin Code">
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
                        @foreach($cartItem as $item)
                            <tr>
                            <td>{{$item->products->name}}</td>
                                <td>{{$item->prod_qty}}</td>
                                <td>{{$item->products->selling_price}}</td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection