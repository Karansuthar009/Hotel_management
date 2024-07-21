<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoomType;
use App\Models\Service;
use App\Models\Testimonial;

class HomeController extends Controller
{
    public function home()
    {
        $rtypes = RoomType::with('roomtypeimages')->get();
        $services = Service::all();
        $testimonials = Testimonial::all();
        return view('home', ['rtypes' => $rtypes, 'services' => $services,'testimonials'=>$testimonials]);
    }

    public function service_detail(Request $request, $id)
    {
        $service = Service::find($id);
        $rtypes = RoomType::all();
        return view('service_detail', ['service' => $service, 'rtypes' => $rtypes]);
    }

    public function add_testimonial()
    {
        return view('add-testimonial');
    }

    public function save_testimonial(Request $request)
    {
        $session = session('customerlogin');

        if ($session=='true') {
            $customerId = session('customer_id');

            $testimonial = new Testimonial();
            $testimonial->customer_id = $customerId;
            $testimonial->testimonial_content = $request->testimonial;
            $testimonial->save();
    
            return redirect('customer/add-testimonial')->with('success', 'Data has been stored');
        } else {
            return redirect()->back()->with('error', 'Customer information not found in session.');
        }
    }
    
}
