@extends('layouts.admin')
@section('content')
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>User Details
                            <a href="{{url('users')}}" class="btn btn-warning text-white float-end bg-gradient-primary">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 mt-3">
                                <label for="">Role</label>
                                <div class="py-2 border">{{$users->role_as == '0'?'User':'Admin'}}</div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <label for="">First Name</label>
                                <div class="py-2 border">{{$users->name}}</div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <label for="">Last Name</label>
                                <div class="py-2 border">{{$users->l_name}}</div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <label for="">Email</label>
                                <div class="py-2 border">{{$users->email}}</div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <label for="">Phone</label>
                                <div class="py-2 border">{{$users->phone}}</div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <label for="">Address 1</label>
                                <div class="py-2 border">{{$users->address_1}}</div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <label for="">Address 2</label>
                                <div class="py-2 border">{{$users->address_1}}</div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <label for="">City</label>
                                <div class="py-2 border">{{$users->city}}</div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <label for="">State</label>
                                <div class="py-2 border">{{$users->state}}</div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <label for="">Country</label>
                                <div class="py-2 border">{{$users->country}}</div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <label for="">Pin Code</label>
                                <div class="py-2 border">{{$users->pin_code}}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
