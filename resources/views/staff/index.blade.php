@extends('layout')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Staff</h6>
                <a href="{{url('admin/staff/create')}}" class="float-right btn btn-success">Add New</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Department</th>
                                <th>Bio</th>
                                <th>Salary Type</th>
                                <th>Salary Amount</th>
                                <th>Photo</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Department</th>
                                <th>Bio</th>
                                <th>Salary Type</th>
                                <th>Salary Amount</th>
                                <th>Photo</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($staff as $staff)
                            <tr>
                                <td>{{$staff->id}}</td>
                                <td>{{$staff->name}}</td>
                                <td>{{$staff->department->title}}</td>
                                <td>{{$staff->bio}}</td>
                                <td>{{$staff->salary_type}}</td>
                                <td>{{$staff->salary_amount}}</td>
                                <td>
                                    <img src="{{ asset('storage/' . $staff->photo) }}" alt="images"
                                        height="80px" width="80px" style="border-radius: 50px;">
                                </td>
                                <td>
                                    <a href="{{url('admin/staff/'. $staff->id )}}" class="btn btn-success">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="{{url('admin/staff/'. $staff->id .'/edit')}}" class="btn btn-primary">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="{{url('admin/staff/delete/'. $staff->id )}}" class="btn btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                    <a href="{{url('admin/staff/payment/'. $staff->id .'/add_payment')}}" class="btn btn-success">
                                        <i class="fa fa-credit-card"></i>
                                    </a>
                                </td>
                            </tr>                        
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@section('scripts')
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
@endsection
@endsection
