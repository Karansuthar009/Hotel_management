@extends('layout')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit Booking</h6>
                <a href="{{ url('admin/booking') }}" class="float-right btn btn-success">View All</a>
            </div>
            <div class="card-body">

                @if (Session::has('success'))
                    <p class="text-success">{{Session('success')}}</p>
                @endif

                @if (Session::has('fail'))
                <p class="text-success">{{Session('fail')}}</p>
                @endif

                <div class="table-responsive">
                    <form action="{{ url('admin/customer') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <table class="table table-bordered">
                            <tr>           
                                <th>Customer</th>
                                <td>
                                    <select name="customer_id" id="customer_id">
                                        <option disabled selected>Choose Customer</option>
                                    </select>
                                </td>
                                <span class="text-danger error-messages" id="customer_id-error"></span>
                            </tr>
                            <tr>
                                <th>Check In Date</th>
                                <td><input type="date" name="check_in_date" id="check_in_date" class="form-control"></td>
                                <span class="text-danger error-messages" id="check_in_date-error"></span>
                            </tr>
                            <tr>
                                <th>Check Out Date</th>
                                <td><input type="date" name="check_out_date" id="check_out_date" class="form-control"></td>
                                <span class="text-danger error-messages" id="check_out_date-error"></span>
                            </tr>

                            <tr>
                                <th>Total Adults</th>
                                <td><input type="text" name="total_adults" class="form-control"></td>
                                <span class="text-danger error-messages" id="total_adults-error"></span>
                            </tr>

                            <tr>
                                <th>Total Children</th>
                                <td><input type="text" name="total_childrens" class="form-control"></td>
                                <span class="text-danger error-messages" id="total_childrens-error"></span>
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
