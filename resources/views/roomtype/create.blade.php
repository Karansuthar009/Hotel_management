@extends('layout')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Add Room Type</h6>
                <a href="{{ url('admin/roomtype') }}" class="float-right btn btn-success">View All</a>
            </div>
            <div class="card-body">

                @if (Session::has('success'))
                    <p class="text-success">{{ Session('success') }}</p>
                @endif
                @if (Session::has('fail'))
                    <p class="text-success">{{ Session('fail') }}</p>
                @endif

                <div class="table-responsive">
                    <form action="{{ url('admin/roomtype') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <table class="table table-bordered">
                            <tr>
                                <th>Title</th>
                                <td><input type="text" name="title" class="form-control"></td>
                                {{-- @if ($errors->has('title'))
                                    <p class="text-danger">{{ $errors->first('title') }}</p>
                                @endif --}}
                            </tr>
                            <tr>
                                <th>Price</th>
                                <td><input type="text" name="price" class="form-control"></td>
                                @if ($errors->has('price'))
                                    <p class="text-danger">{{ $errors->first('price') }}</p>
                                @endif
                            </tr>
                            <tr>
                                <th>Detail</th>
                                <td>
                                    <textarea name="detail" class="form-control"></textarea>
                                </td>
                                {{-- @if ($errors->has('detail'))
                                    <p class="text-danger">{{ $errors->first('detail') }}</p>
                                @endif --}}
                            </tr>
                            <tr>
                                <th>Gallery</th>
                                <td><input type="file" name="photo[]" class="form-control" multiple></td>
                                @if ($errors->has('photo'))
                                    <p class="text-danger">{{ $errors->first('photo') }}</p>
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
