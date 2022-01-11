@extends('admin.dashboard')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>product page</h4>
        </div>
        <div class="card-body">
            <table class="table">
                <thead >
                <tr >
                    <th >id</th>
                    <th >category</th>
                    <th >name</th>
                    <th >description</th>
                    <th >original price</th>
                    <th >selling price</th>
                    <th >image</th>
                    <th >action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($product as $item )
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->category->name}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->description}}</td>
                        <td>{{$item->original_price}}</td>
                        <td>{{$item->selling_price}}</td>

                        <td> <img src="{{ asset('assets/uploads/product/' . $item->image) }}" width="120px;" alt="image here" style="margin-left: 20px" /> </td>
                        <td><a href="{{url('edit-product/'.$item->id)}}" class="btn btn-primary" >edit</a>
                            <a href="{{url('delete-product/'.$item->id)}}" class="btn btn-primary" >delete</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>
        </div>
    </div>
@endsection
