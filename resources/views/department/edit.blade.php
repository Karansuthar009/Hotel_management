@extends('layout')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit Department</h6>
                <a href="{{ url('admin/department') }}" class="float-right btn btn-success">View All</a>
            </div>
            <div class="card-body">

                @if (Session::has('success'))
                    <p class="text-success">{{ Session('success') }}</p>
                @endif

                @if (Session::has('fail'))
                    <p class="text-success">{{ Session('fail') }}</p>
                @endif

                <div class="table-responsive">
                    <form action="{{ url('admin/department/' . $department->id) }}" method="post">
                        @method('PUT')
                        @csrf
                        <table class="table table-bordered">
                            <tr>
                                <th>Title</th>
                                <td>
                                    <input type="text" name="title" class="form-control"
                                        value="{{ $department->title }}">
                                </td>
                                @if ($errors->has('title'))
                                <p class="text-danger">{{ $errors->first('title') }}</p>
                            @endif
                            </tr>
                            <tr>
                                <th>Detail</th>
                                <td>
                                    <textarea name="detail" class="form-control">{{ $department->detail }}</textarea>
                                </td>
                                @if ($errors->has('detail'))
                                <p class="text-danger">{{ $errors->first('detail') }}</p>
                            @endif
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <input type="submit" class="btn btn-primary" value="Edit">
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
