@extends('layouts.front')
@section('title')
    My Wishlist
@endsection
@section('content')
    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <h6 class="mb-0">
                <a href="{{url('/')}}">Home</a> /
                <a href="{{url('wishList')}}">WishList</a>
            </h6>
        </div>
    </div>
    <div class="container my-5">
        <div class="card shadow wishListData">
            <div class="card-body">
            @if($wishlist->count()>0)
                        @foreach($wishlist as $item)
                            <div class="row product_data">
                                <div class="col-md-2 auto">
                                    <img src="{{asset('assets/uploads/product/'.$item->products->image)}}" width="70px" height="70px"  alt="image here">
                                </div>
                                <div class="col-md-2 my-auto">
                                    <h6>{{$item->products->name}}</h6>
                                </div>
                                <div class="col-md-2 my-auto">
                                    <h6>{{$item->products->selling_price}} sp</h6>
                                </div>
                                <div class="col-md-2 auto">
                                    <input type="hidden" value="{{$item->prod_id}}" class="prod_id">
                                    @if($item->products->qty >= $item->prod_qty)
                                    <h6>in stock</h6>
                                        <label for="quantity">Quantity</label>
                                        <div class="input-group text-center mb-3" style="width:130px">
                                            <button class="input-group-text  decrement-btn">-</button>
                                            <input type="text" name="quantity " value="1" class="form-control qty-input text-center"/>
                                            <button class="input-group-text  increment-btn">+</button>
                                        </div>
                                    @else
                                        <h6>out of stock</h6>
                                    @endif
                                </div>
                                <div class="col-md-2 my-auto">
                                    <button class="btn btn-success addToCartBtn"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
                                </div>
                                <div class="col-md-2 my-auto">
                                    <button class="btn btn-danger remove-wishlist-item"><i class="fa fa-trash"></i> Remove</button>
                                </div>
                            </div>
                        @endforeach

                @else
                    <h4>Your Wishlist is Empty</h4>
            @endif
            </div>
        </div>
    </div>
@endsection