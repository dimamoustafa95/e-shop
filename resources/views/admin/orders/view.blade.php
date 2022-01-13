@extends('admin.dashboard')
@section('title')
   view Orders
@endsection
@section('content')
    <div class="container py-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 >Order view
                            <a href="{{url('orders')}}" class="btn btn-warning text-white float-end bg-gradient-primary">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 order-details">
                                <h4>Shipping Details</h4>
                                <hr>
                                <label for="">First Name</label>
                                <div class="border ">{{$orders->f_name}}</div>
                                <label for="">Last Name</label>
                                <div class="border ">{{$orders->l_name}}</div>
                                <label for="">Email</label>
                                <div class="border ">{{$orders->email}}</div>
                                <label for="">Contact No</label>
                                <div class="border ">{{$orders->phone}}</div>
                                <label for="">Shipping Address</label>
                                <div class="border ">
                                    {{$orders->address_1}},<br>
                                    {{$orders->address_2}},<br>
                                    {{$orders->city}},<br>
                                    {{$orders->state}},
                                    {{$orders->country}},
                                </div>
                                <label for="">Zip Code</label>
                                <div class="border ">{{$orders->pin_code}}</div>
                            </div>
                            <div class="col-md-6">
                                <h4>Order Details</h4>
                                <hr>
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Image</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        @foreach($orders->orderItems as $item)
                                            <td>{{$item->products->name}}</td>
                                            <td>{{$item->qty}}</td>
                                            <td>{{$item->price}}</td>
                                            <td>
                                                <img src=" {{asset('assets/uploads/product/'.$item->products->image)}}" width="50px" alt="Product Image">

                                            </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <h5 class="px-2">Grand Total:<span class="float-end"> {{$orders->total_price}}sp</span></h5>
                                <div class="mt-5 px-5">
                                <label for="">Order Status</label>
                                    <form action="{{url('update-order/'.$orders->id)}}" method="post">
                                        @csrf
                                        @method('PUT')

                                <select class="form-select" name="order_status">
                                    <option selected>Open this select menu</option>
                                    <option {{$orders->status =='0' ?'selected':''}} value="0">Pending</option>
                                    <option {{$orders->status =='1' ?'selected':''}} value="1">Completed</option>
                                </select>
                                    <button type="submit" class="btn btn-primary float-end mt-3">Update</button>
                                    </form>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection