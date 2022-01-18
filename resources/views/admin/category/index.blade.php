@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>category page</h4>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">name</th>
                    <th scope="col">description</th>
                    <th scope="col">image</th>
                    <th scope="col">action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($category as $item )
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->description}}</td>

                    <td> <img src="{{ asset('assets/uploads/category/' . $item->image) }}" width="200px;" alt="image here" /> </td>
                    <td><a href="{{url('edit-category/'.$item->id)}}" class="btn btn-primary bg-gradient-primary" >edit</a>
                        <a href="{{url('delete-category/'.$item->id)}}" class="btn btn-primary bg-gradient-primary" style="margin-left: 10px">delete</a>
                    </td>
                </tr>
                @endforeach
                </tbody>

            </table>
        </div>
        </div>
    @endsection
