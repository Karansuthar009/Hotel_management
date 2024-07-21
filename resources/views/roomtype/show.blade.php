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
                        <td>{{ $roomtype->id }}</td>
                    </tr>
                    <tr>
                        <th>Title</th>
                        <td>{{ $roomtype->title }}</td>
                    </tr>
                    <tr>
                        <th>Price</th>
                        <td>{{ $roomtype->price }}</td>
                    </tr>
                    <tr>
                        <th>Detail</th>
                        <td>
                            {{ $roomtype->detail }}
                        </td>
                    </tr>
                    <tr>
                        <th>Gallery</th>
                        <td>
                            @foreach ($photo as $photos)
                                <img src="{{ asset('storage/images/' . $photos->img_src) }}" alt="{{ $photos->img_alt }}" height="100px" width="100px">
                            @endforeach
                        </td>
                    </tr>

                </table>
                <div class="form-group">
                    <a class="btn btn-default" href="{{ url('admin/roomtype/') }}"><i class="fas fa-arrow-left"></i></a>
                </div>
            </div>
        </div>
    </div>
@endsection
