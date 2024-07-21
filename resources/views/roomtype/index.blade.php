@extends('layout')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Room Type</h6>
                <a href="{{ url('admin/roomtype/create') }}" class="float-right btn btn-success">Add New</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Price</th>
                                <th>Detail</th>
                                <th>Gallery</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Price</th>
                                <th>Detail</th>
                                <th>Gallery</th>
                                <th>Actions</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($roomtype as $roomtypes)
                                <tr>
                                    <td>{{ $roomtypes->id ?? ''}}</td>
                                    <td>{{ $roomtypes->title ?? '' }}</td>
                                    <td>{{ $roomtypes->price ?? '' }}</td>
                                    <td>{{ $roomtypes->detail ?? ''}}</td>
                                    <td>
                                        @foreach ($roomtypes->roomtypeimages as $photos)
                                            <img src="{{ asset('storage/images/' . $photos->img_src) }}" alt="{{ $photos->img_alt }}" height="100px" width="100px">
                                        @endforeach
                                    </td>
                                    <td>
                                        <a href="{{ url('admin/roomtype/' . $roomtypes->id) }}" class="btn btn-success">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a href="{{ url('admin/roomtype/' . $roomtypes->id . '/edit') }}"
                                            class="btn btn-primary">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="{{ url('admin/roomtype/delete/' . $roomtypes->id) }}"
                                            class="btn btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@section('scripts')
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
@endsection
@endsection
