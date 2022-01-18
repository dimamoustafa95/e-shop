@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>add product</h4>
        </div>
        <div class="card-body">
            <form action="{{url('update-product/'.$product->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row ">
                    <div class="col-md-8 mb-3" >
                        <select class="form-select"  >
                            <option selected>{{$product->category->name}}</option>
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="">Name</label>
                        <input type="text" class="form-control" value="{{$product->name}}" name="name">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Slug</label>
                        <input type="text" class="form-control" value="{{$product->slug}}" name="slug">
                    </div>
                    <div class="col-md-12 mb-3" >
                        <label for="">description</label>
                        <textarea name="description" rows="3" class="form-control">{{$product->description}}</textarea>
                    </div>
                    <div class="col-md-12 mb-3" >
                        <label for="">small description</label>
                        <textarea name="small_description" rows="3" class="form-control">{{$product->small_description}}</textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">original price</label>
                        <input type="number" class="form-control" value="{{$product->original_price}}" name="original_price">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">selling price</label>
                        <input type="number" class="form-control" value="{{$product->selling_price}}" name="selling_price">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">tax</label>
                        <input type="number" class="form-control" value="{{$product->tax}}" name="tax">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">quantity</label>
                        <input type="number" class="form-control"  value="{{$product->qty}}" name="qty">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Status</label>
                        <input type="checkbox" {{$product->status =='1' ?'checked':''}} name="status">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">trending</label>
                        <input type="checkbox" {{$product->trending =='1' ?'checked':''}} name="trending">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">meta title</label>
                        <input type="text" class="form-control" value="{{$product->meta_title}}" name="meta_title">
                    </div>
                    <div class="col-md-12 mb-3" >
                        <label for="">meta keyword</label>
                        <textarea name="meta_keywords" rows="3" class="form-control">{{$product->meta_keywords}}</textarea>
                    </div>
                    <div class="col-md-12 mb-3" >
                        <label for="">meta description</label>
                        <textarea name="meta_description" rows="3" class="form-control">{{$product->meta_description}}</textarea>
                    </div>
                    @if($product->image)
                        <img src="{{ asset('assets/uploads/product/' . $product->image) }}">
                    @endif
                    <div class="col-md-12 mb-3">
                        <input type="file" class="form-control" name="image">
                    </div>
                    <div class="col-md-12 mb-3">
                        <button type="submit" class="btn btn-primary bg-gradient-primary" >Update</button>
                    </div>

                </div>


            </form>
        </div>
    </div>
@endsection