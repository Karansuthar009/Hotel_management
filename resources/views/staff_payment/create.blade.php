@extends('layout')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Add Staff Payment</h6>
                <a href="{{ url('admin/staff/payment/'.$staff_id.'/') }}" class="float-right btn btn-success">View All</a>
            </div>
            <div class="card-body">

                @if (Session::has('success'))
                    <p class="text-success">{{ Session('success') }}</p>
                @endif

                @if (Session::has('fail'))
                    <p class="text-success">{{ Session('fail') }}</p>
                @endif

                <div class="table-responsive">
                    <form action="{{ url('admin/staff/payment/'. $staff_id) }}" method="post">
                        @csrf
                        <table class="table table-bordered">
                            <tr>
                                <th>Amount</th>
                                <td><input type="number" name="amount" class="form-control"></td>
                            </tr>

                            <tr>
                                <th>Date</th>
                                <td><input type="date" name="payment_date" class="form-control"></td>
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
