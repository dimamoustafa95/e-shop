@extends('admin.dashboard')
@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Registered Users</h4>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead >
                <tr >
                    <th >ID</th>
                    <th >Name</th>
                    <th >Email</th>
                    <th >Phone</th>
                    <th >Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user )
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name.' '.$user->l_name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->phone}}</td>
                        <td>
                            <a href="{{url('view-user/'.$user->id)}}" class="btn btn-primary bg-gradient-primary" >View</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>
        </div>
    </div>
@endsection
