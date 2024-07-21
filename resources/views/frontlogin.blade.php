@extends('frontlayout');
@section('content')
    <div class="container my-4">
        <h3>Register</h3>
        <div class="table-responsive">
            @if (Session::has('error'))
                <p class="text-danger">{{session('error')}}</p>
            @endif
            <form action="{{ url('customer/login') }}" method="post" enctype="multipart/form-data">
                @csrf
                <table class="table table-bordered">
                    <tr>
                        <th>Email<span class="text-danger">*</span></th>
                        <td><input type="email" name="email" class="form-control"></td>
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
                        <td colspan="2">
                            <input type="submit" value="Login" class="btn btn-primary">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    @endsection
