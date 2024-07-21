@extends('layout')

@section('content')
<div class="card">
    <div class="card-header">
       Show {{ $customer->name }}
    </div>
    <div class="card-body">
        <div class="form-group">
            <table class="table table-bordered table-striped">
                <tr>
                    <th>Id</th>
                    <td>{{ $customer->id }}</td>
                </tr>
                <tr>
                    <th>Name</th>
                    <td>{{ $customer->name }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>  
                        {{$customer->email}}
                    </td>  
                </tr>
                <tr>
                    <th>Password</th>
                    <td>  
                        {{$customer->password}}
                    </td>  
                </tr>
                <tr>
                    <th>Mobile</th>
                    <td>{{$customer->mobile}}</td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td>  
                        {{$customer->address}}
                    </td>  
                </tr>
                <tr>
                    <th>Customer Id</th>
                    <td>{{$customer->customer_id_type}}</td>
                </tr>
                <tr>
                    <th>Customer Id Photo</th>
                    <td><img src="{{ asset('storage/' . $customer->customer_id_photo) }}" style="width:100px;height: 70px;"></td>
                </tr>
                <tr>
                    <th>Photo</th>
                    <td><img src="{{ asset('storage/' . $customer->photo) }}" style="width:80px;height: 80px; border-radius: 50px;"></td>
                </tr>
                
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ url('admin/customer/') }}"><i class="fas fa-arrow-left"></i></a>
            </div>
        </div>
    </div>
</div>
@endsection
