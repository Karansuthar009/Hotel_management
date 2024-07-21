@extends('layout')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Add Room</h6>
                <a href="{{ url('admin/room') }}" class="float-right btn btn-success">View All</a>
            </div>
            <div class="card-body">
                @if (Session::has('success'))
                    <p class="text-success">{{ Session('success') }}</p>
                @endif

                @if (Session::has('fail'))
                    <p class="text-success">{{ Session('fail') }}</p>
                @endif
                <div class="table-responsive">
                    <form action="{{ url('admin/room') }}" method="post">
                        @csrf
                        <table class="table table-bordered">
                            <tr>
                                <th>Room Type</th>
                                <td>
                                    <select name="room_type_id" class="form-control">
                                        <option disabled selected>Select Room Type</option>
                                        @foreach ($roomtype as $roomtypes)
                                            <option value="{{ $roomtypes->id }}">{{ $roomtypes->title }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                @if ($errors->has('room_type_id'))
                                    <p class="text-danger">{{ $errors->first('room_type_id') }}</p>
                                @endif
                            </tr>
                            <tr>
                                <th>Title</th>
                                <td><input type="text" name="title" class="form-control"></td>
                                @if ($errors->has('title'))
                                    <p class="text-danger">{{ $errors->first('title') }}</p>
                                @endif
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <input type="submit" value="Save" class="btn btn-primary">
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
