@extends('layout')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Add Booking</h6>
                <a href="{{ url('admin/booking') }}" class="float-right btn btn-success">View All</a>
            </div>
            <div class="card-body">

                @if (Session::has('success'))
                    <p class="text-success">{{ Session('success') }}</p>
                @endif

                @if (Session::has('fail'))
                    <p class="text-success">{{ Session('fail') }}</p>
                @endif

                <div class="table-responsive">
                    <form action="{{ url('admin/booking') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <table class="table table-bordered">
                            <tr>
                                <th>Customer</th>
                                <td>
                                    <select name="customer_id" id="customer_id" class="form-control">
                                        <option disabled selected>Choose Customer</option>
                                        @foreach ($customer as $customers)
                                            <option value="{{ $customers->id }}">{{ $customers->name }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                @if ($errors->has('customer_id'))
                                    <p class="text-danger">{{ $errors->first('customer_id') }}</p>
                                @endif
                            </tr>
                            <tr>
                                <th>Check In Date</th>
                                <td><input type="date" name="checkin_date" id="checkin_date"
                                        class="form-control checkin_date" class="checkin_date"></td>
                                @if ($errors->has('checkin_date'))
                                    <p class="text-danger">{{ $errors->first('checkin_date') }}</p>
                                @endif
                            </tr>
                            <tr>
                                <th>Check Out Date</th>
                                <td><input type="date" name="checkout_date" id="checkout_date"
                                        class="form-control checkout_date"></td>
                                @if ($errors->has('checkout_date'))
                                    <p class="text-danger">{{ $errors->first('checkout_date') }}</p>
                                @endif
                            </tr>

                            <tr>
                                <th>Available Rooms</th>
                                <td>
                                    <select name="room_id" id="room_id" class="form-control room-list">
        
                                    </select>
                                    <p>Price: <span class="show-room-price"></span></p>
                                    @if ($errors->has('room_id'))
                                        <p class="text-danger">{{ $errors->first('room_id') }}</p>
                                    @endif
                                </td>
                            </tr>

                            <tr>
                                <th>Total Adults</th>
                                <td><input type="text" name="total_adults" class="form-control"></td>
                                @if ($errors->has('total_adults'))
                                    <p class="text-danger">{{ $errors->first('total_adults') }}</p>
                                @endif
                            </tr>

                            <tr>
                                <th>Total Children</th>
                                <td><input type="text" name="total_childrens" class="form-control"></td>
                                @if ($errors->has('total_childrens'))
                                    <p class="text-danger">{{ $errors->first('total_childrens') }}</p>
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
@section('scripts')
<script type="text/javascript">
    $(document).ready(function() {
        $(".checkin_date").on('change', function() {
            var checkin_date = $(this).val();

            $.ajax({
                type: "get",
                url: "{{ url('admin/booking/available-room') }}/" + checkin_date,
                dataType: "json",
                beforeSend: function() {
                    $("#room_id").html(
                    '<option> -- Loading -- </option>'); // Changed class selector to ID selector
                },
                success: function(response) {
                    var _html = '';
                    $.each(response.rooms, function(index, row) {
                        _html += '<option data-price="' + row.roomtype.price +
                            '" value="' + row.room.id + '">' + row.room.title +
                            '-' + row.roomtype.title + '</option>';
                    });
                    $("#room_id").html(_html);
                    var _selectedPrice = $(".room-list").find('option:selected').attr(
                        'data-price');
                    $(".room-price").val();
                    $(".show-room-price").text(_selectedPrice);
                }
            });
        });
        $(document).on("change", ".room-list", function() {
            var _selectedPrice = $(this).find('option:selected').attr('data-price');
            $(".room-price").val();
            $(".show-room-price").text(_selectedPrice);
        });
    });
</script>
@endsection
