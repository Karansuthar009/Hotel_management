@extends('layout')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit Satff</h6>
                <a href="{{ url('admin/staff') }}" class="float-right btn btn-success">View All</a>
            </div>
            <div class="card-body">

                @if (Session::has('success'))
                    <p class="text-success">{{ Session('success') }}</p>
                @endif

                @if (Session::has('fail'))
                    <p class="text-success">{{ Session('fail') }}</p>
                @endif

                <div class="table-responsive">
                    <form action="{{ url('admin/staff/'. $staff->id) }}" method="post" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <table class="table table-bordered">
                            <tr>
                                <th>Name</th>
                                <td><input type="text" name="name" class="form-control" value="{{$staff->name}}"></td>
                                @if ($errors->has('name'))
                                    <p class="text-danger">{{ $errors->first('name') }}</p>
                                @endif
                            </tr>
                            <tr>
                                <th>Staff Department</th>
                                <td>
                                    <select name="department_id" class="form-control">
                                        <option disabled selected>Choose Your Department</option>
                                        @foreach ($department as $departments)
                                            <option value="{{ $departments->id }}"{{$staff->department_id ? 'selected' : ''}}>{{ $departments->title }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                @if ($errors->has('department_id'))
                                    <p class="text-danger">{{ $errors->first('department_id') }}</p>
                                @endif
                            </tr>
                            <tr>
                                <th>Bio</th>
                                <td><input type="text" name="bio" class="form-control" value="{{$staff->bio}}"></td>
                                @if ($errors->has('bio'))
                                    <p class="text-danger">{{ $errors->first('bio') }}</p>
                                @endif
                            </tr>
                            <tr>
                                <th>Salary Type</th>
                                <td>
                                    <select name="salary_type" class="form-control">
                                        <option disabled selected>Choose Salary Type</option>
                                        <option value="Daily"{{$staff->salary_type == 'Daily' ? 'selected' : ''}}>Daily</option>
                                        <option value="Monthely"{{$staff->salary_type == 'Monthely' ? 'selected' : ''}}>Monthely</option>
                                        <option value="Yearly"{{$staff->salary_type == 'Yearly' ? 'selected' : ''}}>Yearly</option>
                                    </select>
                                </td>
                                @if ($errors->has('salary_type'))
                                    <p class="text-danger">{{ $errors->first('salary_type') }}</p>
                                @endif
                            </tr>
                            <tr>
                                <th>Salary Amount</th>
                                <td>
                                    <input type="number" name="salary_amount" class="form-control" value="{{$staff->salary_amount}}">
                                </td>
                                @if ($errors->has('salary_amount'))
                                    <p class="text-danger">{{ $errors->first('salary_amount') }}</p>
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
