@extends('layout')

@section('content')
<div class="card">
    <div class="card-header">
       Show Department
    </div>
    <div class="card-body">
        <div class="form-group">
            <table class="table table-bordered table-striped">
                <tr>
                    <th>Id</th>
                    <td>{{ $department->id }}</td>
                </tr>
                <tr>
                    <th>Title</th>
                    <td>{{ $department->title }}</td>
                </tr>
                <tr>
                    <th>Detail</th>
                    <td>  
                        {{$department->detail}}
                    </td>  
                </tr>
                
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ url('admin/department/') }}"><i class="fas fa-arrow-left"></i></a>
            </div>
        </div>
    </div>
</div>
@endsection
