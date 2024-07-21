<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\RoomType;
use App\Models\Booking;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    public function index()
    {
        $booking = Booking::all();
        return view('booking.index', ['booking' => $booking]);
    }

    public function create()
    {
        $customer = Customer::all();
        return view('booking.create', ['customer' => $customer]);
    }

    public function store(Request $request)
    {
        //   dd($request->all());
        // $request->validate([
        //     'customer_id' => 'required',
        //     'room_id' => 'required',
        //     'checkin_date' => 'required',
        //     'checkout_date' => 'required',
        //     'total_adults' => 'required',
        //     'total_choldrens' => 'required',

        // ]);

        if ($request->ref == 'front') {
            $sessionData = [
                'customer_id' => $request->customer_id,
                'room_id' => $request->room_id,
                'checkin_date' => $request->checkin_date,
                'checkout_date' => $request->checkout_date,
                'total_adults' => $request->total_adults,
                'total_children' => $request->total_childrens,
                'roomprice' => $request->roomprice,
                'ref' => $request->ref,
            ];
            // dd($sessionData);
            session($sessionData);

            \Stripe\Stripe::setApiKey('sk_test_51OuWD6KBMtgBHuIlPjEkfyuqpPAB5NEiqU0yZ8Qe0kMWWEHDONyO0jcwgTqyV0zIx584VodjmsjMMd7R4EBwqsri00HTGD2Q9Q');

            // Create a Stripe checkout session
            $session = \Stripe\Checkout\Session::create([
                'payment_method_types' => ['card'],
                'line_items' => [[
                    'price_data' => [
                        'currency' => 'inr',
                        'product_data' => [
                            'name' => 'room',
                        ],
                        'unit_amount' => $request->roomprice * 100,
                    ],
                    'quantity' => 1,
                ]],
                'mode' => 'payment',
                'success_url' => url('booking/success') . '?session_id={CHECKOUT_SESSION_ID}',
                'cancel_url' => url('booking/fail'),

            ]);

            return redirect($session->url);
        } else {

            $data = new Booking;
            $data->customer_id = $request->customer_id;
            $data->room_id = $request->room_id;
            $data->checkin_date = $request->checkin_date;
            $data->checkout_date = $request->checkout_date;
            $data->total_adults = $request->total_adults;
            $data->total_childrens = $request->total_childrens;
            if ($request->ref == 'front') {
                $data->ref = 'front';
            } else {
                $data->ref = 'admin';
            }

            $data->save();


            return redirect('admin/booking/create')->with('success', 'Data has been added');
        }
        return redirect('admin/booking/create')->with('success', 'Data has been added');
    }

    public function destroy($id)
    {
        $booking = Booking::find($id);

        if (!$booking) {
            return redirect()->back()->with('error', 'booking not found.');
        } else {
            $booking->delete();
            return redirect()->back()->with('success', 'Booking has been deleted successfully.');
        }
    }


    public function availableRooms($checkin_date)
    {
        // dd($checkin_date);

        $arooms = DB::SELECT("SELECT * FROM rooms WHERE id NOT IN (SELECT room_id FROM bookings WHERE '$checkin_date' BETWEEN checkin_date AND checkout_date)");

        $rooms = [];
        foreach ($arooms as $room) {
            $roomtype = RoomType::find($room->room_type_id);
            $rooms[] = ['room' => $room, 'roomtype' => $roomtype];
        }
        return response()->json(['rooms' => $rooms]);
    }

    public function front_booking()
    {
        $customer = Customer::all();
        return view('front_booking');
    }

    public function booking_payment_success(Request $request)
    {
        \Stripe\Stripe::setApiKey('sk_test_51OuWD6KBMtgBHuIlPjEkfyuqpPAB5NEiqU0yZ8Qe0kMWWEHDONyO0jcwgTqyV0zIx584VodjmsjMMd7R4EBwqsri00HTGD2Q9Q');
        $sessionId = $request->get('session_id');
        $session = \Stripe\Checkout\Session::retrieve($sessionId);

        if ($session->payment_status == 'paid') {
            //  dd($request->session());
            $data = new Booking;
            $data->customer_id = session('customer_id');
            $data->room_id = session('room_id');
            $data->checkin_date = session('checkin_date');
            $data->checkout_date = session('checkout_date');
            $data->total_adults = session('total_adults');
            $data->total_childrens = session('total_children');
            // dd(session('ref'));
            if (session('ref') == 'front') {
                $data->ref = 'front';
            } else {
                $data->ref = 'admin';
            }
            $data->save();

            return view('booking.success');
        }else{
            return redirect('booking.fail')->with('error', 'Data has been fail');
        }
    }

    public function booking_payment_fail(Request $request)
    {
        return view('booking.fail');
    }
}
