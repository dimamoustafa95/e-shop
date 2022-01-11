@extends('admin.dashboard')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>add product</h4>
        </div>
        <div class="card-body">
            <form action="{{url('insert-product')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row ">
                    <div class="col-md-8 mb-3" >
                        <select class="form-select" name="cate_id" >
                            <option selected>select a category</option>
                           @foreach($category as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                               @endforeach
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="name">
                    </div>
{{--                    <div class="col-md-6 mb-3">--}}
{{--                        <label for="">Slug</label>--}}
{{--                        <input type="text" class="form-control" name="slug">--}}
{{--                    </div>--}}
                    <div class="col-md-12 mb-3" >
                        <label for="">description</label>
                        <textarea name="description" rows="3" class="form-control"></textarea>
                    </div>
                    <div class="col-md-12 mb-3" >
                        <label for="">small description</label>
                        <textarea name="small_description" rows="3" class="form-control"></textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">original price</label>
                        <input type="number" class="form-control" name="original_price">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">selling price</label>
                        <input type="number" class="form-control" name="selling_price">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">tax</label>
                        <input type="number" class="form-control" name="tax">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">quantity</label>
                        <input type="number" class="form-control" name="qty">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Status</label>
                        <input type="checkbox"  name="status">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">trending</label>
                        <input type="checkbox"  name="trending">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">meta title</label>
                        <input type="text" class="form-control" name="meta_title">
                    </div>
                    <div class="col-md-12 mb-3" >
                        <label for="">meta keyword</label>
                        <textarea name="meta_keywords" rows="3" class="form-control"></textarea>
                    </div>
                    <div class="col-md-12 mb-3" >
                        <label for="">meta description</label>
                        <textarea name="meta_description" rows="3" class="form-control"></textarea>
                    </div>
                    <div class="col-md-12 mb-3">
                        <input type="file" class="form-control" name="image">
                    </div>
                    <div class="col-md-12 mb-3">
                        <button type="submit" class="btn btn-primary" >Submit</button>
                    </div>

                </div>


            </form>
        </div>
    </div>
@endsection