@extends('layout')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit Customer</h6>
                <a href="{{ url('admin/customer') }}" class="float-right btn btn-success">View All</a>
            </div>
            <div class="card-body">

                @if (Session::has('success'))
                    <p class="text-success">{{ Session('success') }}</p>
                @endif

                @if (Session::has('fail'))
                    <p class="text-success">{{ Session('fail') }}</p>
                @endif

                <div class="table-responsive">
                    <form action="{{ url('admin/customer/' . $customer->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <table class="table table-bordered">
                            <tr>
                                <th>Name</th>
                                <td><input type="text" name="name" class="form-control" value="{{ $customer->name }}">
                                </td>
                                @if ($errors->has('name'))
                                    <p class="text-danger">{{ $errors->first('name') }}</p>
                                @endif
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td><input type="text" name="email" class="form-control"
                                        value="{{ $customer->email }}"></td>
                                @if ($errors->has('email'))
                                    <p class="text-danger">{{ $errors->first('email') }}</p>
                                @endif
                            </tr>
                            <tr>
                                <th>Password</th>
                                <td><input type="password" name="password" class="form-control"
                                        value="{{ $customer->password }}"></td>
                                @if ($errors->has('password'))
                                    <p class="text-danger">{{ $errors->first('password') }}</p>
                                @endif
                            </tr>
                            <tr>
                                <th>Mobile</th>
                                <td><input type="number" name="mobile" class="form-control"
                                        value="{{ $customer->mobile }}"></td>
                                @if ($errors->has('mobile'))
                                    <p class="text-danger">{{ $errors->first('mobile') }}</p>
                                @endif
                            </tr>
                            <tr>
                                <th>Address</th>
                                <td>
                                    <textarea name="address" class="form-control">{{ $customer->address }}</textarea>
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
                                        <option value="Aadhar Id"{{$customer->customer_id_type == 'Aadhar Id' ? 'selected' : ''}}>Aadhar Id</option>
                                        <option value="Voter Id"{{$customer->customer_id_type == 'Voter Id' ? 'selected' : ''}}>Voter Id</option>
                                        <option value="Pan Id"{{$customer->customer_id_type == 'Pan Id' ? 'selected' : ''}}>Pan Id</option>
                                    </select>
                                    @if ($errors->has('customer_id_type'))
                                        <p class="text-danger">{{ $errors->first('customer_id_type') }}</p>
                                    @endif
                                </td>
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
                                    <input type="submit" value="Edit" class="btn btn-primary">
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
