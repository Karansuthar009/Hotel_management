@extends('layout')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit Room Type</h6>
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
                    <form action="{{ url('admin/roomtype/' . $roomtype->id) }}" method="post"
                        enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <table class="table table-bordered">
                            <tr>
                                <th>Title</th>
                                <td><input type="text" name="title" class="form-control"
                                        value="{{ $roomtype->title }}"></td>
                                @if ($errors->has('title'))
                                    <p class="text-danger">{{ $errors->first('title') }}</p>
                                @endif
                            </tr>
                            <tr>
                                <th>Price</th>
                                <td><input type="text" name="price" class="form-control"
                                        value="{{ $roomtype->price }}"></td>
                                @if ($errors->has('price'))
                                    <p class="text-danger">{{ $errors->first('price') }}</p>
                                @endif
                            </tr>
                            <tr>
                                <th>Detail</th>
                                <td>
                                    <textarea name="detail" class="form-control">{{ $roomtype->detail }}</textarea>
                                </td>
                                @if ($errors->has('detail'))
                                    <p class="text-danger">{{ $errors->first('detail') }}</p>
                                @endif
                            </tr>
                            <tr>
                                <th>Gallery</th>
                                <td>
                                    <table class="table table-bordered">
                                        <tr>
                                        <tr>
                                            <td style="position: relative;">
                                                <input type="file" name="photo[]" id="fileInput" class="form-control"
                                                    multiple style="display: none;">
                                                <label for="fileInput" style="cursor: pointer;">
                                                    <img width="64" height="64"
                                                        src="https://img.icons8.com/dusk/64/upload--v1.png"
                                                        alt="upload--v1" />
                                                </label>
                                            </td>
                                        </tr>
                                        @foreach ($roomtype->roomtypeimages as $photos)
                                            <td style="position: relative;" class="photocol{{ $photos->id }}">
                                                <img src="{{ asset('storage/images/' . $photos->img_src) }}"
                                                    alt="{{ $photos->img_alt }}" height="150px" width="150px">
                                                <button type="button"
                                                    onclick="return confirm('Are you sure you want to delete this photo ??')"
                                                    class="btn btn-danger btn-sm delete-photo"
                                                    data-photo-id="{{ $photos->id }}"
                                                    style="position: absolute; bottom: -30px; left: 70px;">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </td>
                                        @endforeach
                            </tr>
                        </table>
                        </td>
                        @if ($errors->has('photo'))
                            <p class="text-danger">{{ $errors->first('photo') }}</p>
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
@section('scripts')
    <script>
        $(document).ready(function() {
            $(".delete-photo").on('click', function() {
                // console.log('hello');
                var photo_id = $(this).attr('data-photo-id');
                var _vm = $(this);
                // console.log(photo_id);
                $.ajax({
                    type: "get",
                    url: "{{ url('admin/roomtypeimage/delete') }}/" + photo_id,
                    dataType: "json",
                    beforeSend: function() {
                        _vm.addClass('disabled');
                    },
                    success: function(response) {
                        // console.log(response);
                        if (response.bool == true) {
                            $(".photocol" + photo_id).remove();
                        }
                        _vm.addClass('disabled');
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            });
        });
    </script>
@endsection
@endsection
