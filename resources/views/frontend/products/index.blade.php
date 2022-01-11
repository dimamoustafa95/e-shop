@extends('layouts.front')

@section('title')
    {{$category->name}}
@endsection

@section('content')
    <div class="py-5">
        <div class="py-3 mb-4 shadow-sm bg-warning border-top">
            <div class="container">
                <h6 class="mb-0">Collection/ {{$category->name}}</h6>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <h2>{{$category->name}}</h2>
                    @foreach($product as $item)
                        <div class="col-md-4 mb-3">
                            <div class="card">
                                <a href="{{url('category/'.$category->slug.'/'.$item->slug)}}">
                                <img src="{{asset('assets/uploads/product/'.$item->image)}}"  width="220px"  alt="product image">
                                <div class="card-body">
                                    <h5>{{$item->name}}</h5>
                                    <span class="float-start">{{$item->selling_price}}</span>
                                    <span class="float-end"> <s>{{$item->original_price}}</s></span>
                                </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
            </div>
        </div>
    </div>
@endsection