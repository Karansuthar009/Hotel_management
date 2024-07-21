@extends('layout')

@section('content')
<div class="card">
    <div class="card-header">
       Show {{ $staff->name }}
    </div>
    <div class="card-body">
        <div class="form-group">
            <table class="table table-bordered table-striped">
                <tr>
                    <th>Id</th>
                    <td>{{ $staff->id }}</td>
                </tr>
                <tr>
                    <th>Name</th>
                    <td>{{ $staff->name }}</td>
                </tr>
                <tr>
                    <th>Staff Department</th>
                    <td> {{$staff->department->title}} </td>        
                </tr>

                <tr>
                    <th>Bio</th>
                    <td>{{ $staff->bio }}</td>
                </tr>
                <tr>
                    <th>Salary Type</th>
                    <td>{{ $staff->salary_type }}</td>
                </tr>
                 
                <tr>
                    <th>Salary Amount</th>
                    <td>{{ $staff->salary_amount }}</td>
                </tr>
                
                <tr>
                    <th>Photo</th>
                    <td><img src="{{ asset('storage/' . $staff->photo) }}" style="width:80px;height: 80px; border-radius: 50px;"></td>
                </tr>


            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ url('admin/staff/') }}"><i class="fas fa-arrow-left"></i></a>
            </div>
        </div>
    </div>
</div>
@endsection
