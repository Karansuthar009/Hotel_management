<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\RoomType;
use App\Models\Room;
use App\Models\Testimonial;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function login_check(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        // dd($request->password);
        $username = $request->username;
        $password = $request->password;

        $admin = Admin::where(['username' => $username, 'password' => sha1($password)])->count();
        // dd($admin);
        if ($admin > 0) {
            $adminData = Admin::where(['username' => $request->username, 'password' => sha1($request->password)])->get();
            if ($adminData->isNotEmpty()) {
                session(['adminData' => $adminData]);
            } else {
                dd('Data not');
            }
            
            if ($request->has('remember')) {
                Cookie::queue('adminuser', $request->username, 1440);
                Cookie::queue('adminpwd', $request->password, 1440);
            }
            return redirect('admin');
        } else {
            return redirect('admin/login')->with('msg', 'Invalid username and password');
        }
    }
    public function logout()
    {
        session()->forget(['adminData']);
        return redirect('admin/login');
    }

    public function dashboard()
    {
        $booking = Booking::selectRaw('count(id) as total_bookings,checkin_date')->groupBy('checkin_date')->get();

        $labels = [];
        $data = [];
        foreach ($booking as $bookings) {
            $labels[] = $bookings['checkin_date'];
            $data[] = $bookings['total_bookings'];
        }

        // pai chart
        $rtbooking = DB::table('room_types as rt')
            ->join('rooms as r', 'r.room_type_id', '=', 'rt.id')
            ->join('bookings as b', 'b.room_id', '=', 'r.id')
            ->select('rt.detail', DB::raw('count(b.id) as total_bookings'))
            ->groupBy('r.room_type_id')
            ->get();


        $plabels = [];
        $pdata = [];
        foreach ($rtbooking as $rtbookings) {
            $plabels[] = $rtbookings->detail;
            $pdata[] = $rtbookings->total_bookings;
        }
        //end pai chart

        // echo '<pre>';
        // print_r($rtbooking);

        return view('dashboard', ['labels' => $labels, 'data' => $data, 'plabels' => $plabels, 'pdata' => $pdata]);
    }

    public function testimonials()
    {
        $testimonials = Testimonial::all();
        return view('admin_testimonials', ['testimonials'=>$testimonials]);
    }
}
