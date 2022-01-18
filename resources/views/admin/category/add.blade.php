@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>add category</h4>
        </div>
        <div class="card-body">
           <form action="{{url('insert-category')}}" method="POST" enctype="multipart/form-data">
    @csrf
               <div class="row ">
                   <div class="col-md-6">

                           <label for="">Name</label>
                       <input type="text" class="form-control" name="name">
                       </div>

                   <div class="col-md-12" >
                       <label for="">description</label>
                   <textarea name="description" rows="3" class="form-control"></textarea>
                   </div>
                   <div class="col-md-6 mb-3">
                       <label for="">Status</label>
                       <input type="checkbox"  name="status">
                   </div>
                   <div class="col-md-6 mb-3">
                       <label for="">Popular</label>
                       <input type="checkbox"  name="popular">
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
                       <textarea name="meta_descrip" rows="3" class="form-control"></textarea>
                   </div>
                   <div class="col-md-12">
                       <input type="file" class="form-control" name="image">
                   </div>
                   <div class="col-md-12 mt-3">
                       <button type="submit" class="btn btn-primary bg-gradient-primary" >Submit</button>
                   </div>

               </div>


           </form>
        </div>
    </div>
@endsection