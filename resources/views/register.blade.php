@extends('frontlayout');
@section('content')
    <div class="container my-4">
        <h3>Register</h3>
        <div class="table-responsive">
            @if (Session::has('success'))
                <p class="text-success">{{session('success')}}</p>
            @endif
            <form action="{{ url('admin/customer') }}" method="post" enctype="multipart/form-data">
                @csrf
                <table class="table table-bordered">
                    <tr>
                        <th>Name<span class="text-danger">*</span></th>
                        <td><input type="text" name="name" class="form-control"></td>
                        @if ($errors->has('name'))
                            <p class="text-danger">{{ $errors->first('name') }}</p>
                        @endif
                    </tr>
                    <tr>
                        <th>Email<span class="text-danger">*</span></th>
                        <td><input type="text" name="email" class="form-control"></td>
                        @if ($errors->has('email'))
                            <p class="text-danger">{{ $errors->first('email') }}</p>
                        @endif
                    </tr>
                    <tr>
                        <th>Password<span class="text-danger">*</span></th>
                        <td><input type="password" name="password" class="form-control"></td>
                        @if ($errors->has('password'))
                            <p class="text-danger">{{ $errors->first('password') }}</p>
                        @endif
                    </tr>
                    <tr>
                        <th>Mobile<span class="text-danger">*</span></th>
                        <td><input type="number" name="mobile" class="form-control"></td>
                        @if ($errors->has('mobile'))
                            <p class="text-danger">{{ $errors->first('mobile') }}</p>
                        @endif
                    </tr>
                    <tr>
                        <th>Address<span class="text-danger">*</span></th>
                        <td>
                            <textarea name="address" class="form-control"></textarea>
                        </td>
                        @if ($errors->has('address'))
                            <p class="text-danger">{{ $errors->first('address') }}</p>
                        @endif
                    </tr>
                
                    <tr>
                        <td colspan="2">
                            <input type="hidden" name="ref" value="front" />
                            <input type="submit" value="Save" class="btn btn-primary">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    @endsection
