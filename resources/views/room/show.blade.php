@extends('layout')

@section('content')
<div class="card">
    <div class="card-header">
       Show Room
    </div>
    <div class="card-body">
        <div class="form-group">
            <table class="table table-bordered table-striped">
                <tr>
                    <th>Id</th>
                    <td>{{ $room->id }}</td>
                </tr>
                <tr>
                    <th>Room Type</th>
                    <td>{{ $room->roomtype->title }}</td>
                </tr>
                <tr>
                    <th>Title</th>
                    <td>{{ $room->title }}</td>
                </tr>
                
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ url('admin/room/') }}"><i class="fas fa-arrow-left"></i></a>
            </div>
        </div>
    </div>
</div>
@endsection
