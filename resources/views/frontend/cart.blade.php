@extends('layouts.front')
@section('title')
    My Cart
@endsection
@section('content')
    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <h6 class="mb-0">
                <a href="{{url('/')}}">Home</a> /
                <a href="{{url('cart')}}">Cart</a>

            </h6>
        </div>
    </div>
    <div class="container my-5">
        <div class="card shadow product_data">
            <div class="card-body">
                @php $total=0; @endphp
                @foreach($cartData as $item)
                <div class="row product_data">
                    <div class="col-md-2">
                        <img src="{{asset('assets/uploads/product/'.$item->products->image)}}" width="70px" height="70px"  alt="image here">
                    </div>
                    <div class="col-md-3 my-auto">
                        <h6>{{$item->products->name}}</h6>
                    </div>
                    <div class="col-md-2 my-auto">
                        <h6>{{$item->products->selling_price}} sp</h6>
                    </div>
                    <div class="col-md-3">
                        <input type="hidden" value="{{$item->prod_id}}" class="prod_id">
                        @if($item->products->qty >= $item->prod_qty)
                        <label for="quantity">Quantity</label>
                        <div class="input-group text-center mb-3" style="width:130px">
                            <button class="input-group-text changeQuantity decrement-btn">-</button>
                            <input type="text" name="quantity " value="{{$item->prod_qty}}" class="form-control qty-input text-center"/>
                            <button class="input-group-text changeQuantity increment-btn">+</button>
                        </div>
                            @php $total += $item->products->selling_price*$item->prod_qty ; @endphp
                            @else
                            <h6>out of stock</h6>
                            @endif
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-danger deleteCartItem"><i class="fa fa-trash"></i> Remove</button>
                    </div>
                </div>

                    @endforeach
            </div>
            <div class="card-footer">
                <h6>total price : {{$total}} sp
                <a href="{{url('checkout')}}" class="btn btn-outline-success float-end">checkout</a>
                </h6>
            </div>
        </div>
    </div>


@endsection