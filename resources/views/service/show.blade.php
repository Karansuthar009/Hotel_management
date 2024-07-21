@extends('layout')

@section('content')
    <div class="card">
        <div class="card-header">
            Show Room Type
        </div>
        <div class="card-body">
            <div class="form-group">
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>Id</th>
                        <td>{{ $service->id }}</td>
                    </tr>
                    <tr>
                        <th>Title</th>
                        <td>{{ $service->title }}</td>
                    </tr>
                    <tr>
                        <th>Small Detail</th>
                        <td>{{ $service->small_detail }}</td>
                    </tr>
                    <tr>
                        <th>Full Detail</th>
                        <td>{{ $service->full_detail }}</td>
                    </tr>
                    <tr>
                        <th>Photo</th>
                        <td>
                            <img src="{{asset('storage/'. $service->photo)}}" height="100px" width="100px">
                        </td>
                    </tr>

                </table>
                <div class="form-group">
                    <a class="btn btn-default" href="{{ url('admin/service/') }}"><i class="fas fa-arrow-left"></i></a>
                </div>
            </div>
        </div>
    </div>
@endsection
