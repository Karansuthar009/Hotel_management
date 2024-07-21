@extends('frontlayout')
@section('content')
    <!-- Begin Page Content -->
    <div class="container my-4">
        <h3>Room Booking</h3>
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
                        <th>Check In Date</th>
                        <td>
                            <input type="date" name="checkin_date" id="checkin_date" class="form-control checkin_date">
                            @if ($errors->has('checkin_date'))
                                <p class="text-danger">{{ $errors->first('checkin_date') }}</p>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Check Out Date</th>
                        <td>
                            <input type="date" name="checkout_date" id="checkout_date"
                                class="form-control checkout_date">
                            @if ($errors->has('checkout_date'))
                                <p class="text-danger">{{ $errors->first('checkout_date') }}</p>
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <th class="align-middle">Available Rooms</th>
                        <td>
                            <div class="row">
                                <div class="col-md-9">
                                    <select name="room_id" id="room_id" class="form-control room-list">
                                        <!-- Your options here -->
                                    </select>
                                    @if ($errors->has('room_id'))
                                        <p class="text-danger">{{ $errors->first('room_id') }}</p>
                                    @endif
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="price" class="price-label">Price: </label>
                                        <span class="show-room-price"></span>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>                    

                    <tr>
                        <th>Total Adults</th>
                        <td>
                            <input type="text" name="total_adults" class="form-control">
                            @if ($errors->has('total_adults'))
                                <p class="text-danger">{{ $errors->first('total_adults') }}</p>
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <th>Total Children</th>
                        <td>
                            <input type="text" name="total_childrens" class="form-control">
                            @if ($errors->has('total_childrens'))
                                <p class="text-danger">{{ $errors->first('total_childrens') }}</p>
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2">
                            <input type="hidden" name="customer_id" value="{{ Session('customer_id') }}">
                            <input type="hidden" name="roomprice" class="room-price" value="" />
                            <input type="hidden" name="ref" value="front">
                            <input type="submit" value="Save" class="btn btn-primary">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
                            '<option> -- Loading -- </option>'
                        ); 
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
                        $(".room-price").val(
                        _selectedPrice);
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
