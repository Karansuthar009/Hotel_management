@extends('frontlayout');
@section('content')
    <div class="container my-4">
        <h3 class="mb-3">Add Testimonial</h3>
        @if (Session::has('success'))
                <p class="text-danger">{{session('success')}}</p>
            @endif
        @if (Session::has('error'))
                <p class="text-danger">{{session('error')}}</p>
            @endif
            <form action="{{ url('customer/save-testimonial') }}" method="post" enctype="multipart/form-data">
                @csrf
                <table class="table table-bordered">
                    <tr>
                        <th>Testimonial<span class="text-danger">*</span></th>
                        <td><textarea name="testimonial" class="form-control" rows="8"></textarea></td>
                        @if ($errors->has('email'))
                            <p class="text-danger">{{ $errors->first('testimonial') }}</p>
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
    @endsection
