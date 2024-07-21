@extends('layout')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Add Customer</h6>
                <a href="{{ url('admin/customer') }}" class="float-right btn btn-success">View All</a>
            </div>
            <div class="card-body">

                @if (Session::has('success'))
                    <p class="text-success">{{ Session('success') }}</p>
                @endif
                {{-- 
                @if (Session::has('fail'))
                    <p class="text-success">{{ Session('fail') }}</p>
                @endif --}}

                <div class="table-responsive">
                    <form action="{{ url('admin/customer') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <table class="table table-bordered">
                            <tr>
                                <th>Name</th>
                                <td><input type="text" name="name" class="form-control"></td>
                                @if ($errors->has('name'))
                                    <p class="text-danger">{{ $errors->first('name') }}</p>
                                @endif
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td><input type="text" name="email" class="form-control"></td>
                                @if ($errors->has('email'))
                                    <p class="text-danger">{{ $errors->first('email') }}</p>
                                @endif
                            </tr>
                            <tr>
                                <th>Password</th>
                                <td><input type="password" name="password" class="form-control"></td>
                                @if ($errors->has('password'))
                                    <p class="text-danger">{{ $errors->first('password') }}</p>
                                @endif
                            </tr>
                            <tr>
                                <th>Mobile</th>
                                <td><input type="number" name="mobile" class="form-control"></td>
                                @if ($errors->has('mobile'))
                                    <p class="text-danger">{{ $errors->first('mobile') }}</p>
                                @endif
                            </tr>
                            <tr>
                                <th>Address</th>
                                <td>
                                    <textarea name="address" class="form-control"></textarea>
                                </td>
                                @if ($errors->has('address'))
                                    <p class="text-danger">{{ $errors->first('address') }}</p>
                                @endif
                            </tr>
                            <tr>
                                <th>Customer Id Type</th>
                                <td>
                                    <select name="customer_id_type" id="customer_id_type" class="form-control">
                                        <option disabled selected>Choose Id</option>
                                        <option value="Aadhar Id">Aadhar Id</option>
                                        <option value="Voter Id">Voter Id</option>
                                        <option value="Pan Id">Pan Id</option>
                                    </select>
                                </td>
                                @if ($errors->has('customer_id_type'))
                                    <p class="text-danger">{{ $errors->first('customer_id_type') }}</p>
                                @endif
                            </tr>
                            <tr>
                                <th>Customer Id Photo</th>
                                <td><input type="file" name="customer_id_photo" class="form-control"></td>
                                @if ($errors->has('customer_id_photo'))
                                    <p class="text-danger">{{ $errors->first('customer_id_photo') }}</p>
                                @endif
                            </tr>
                            <tr>
                                <th>Photo</th>
                                <td><input type="file" name="photo" class="form-control"></td>
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
