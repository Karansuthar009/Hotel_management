<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customer = Customer::all();
        return view('customer.index',compact('customer'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:customers',
            'password' => 'required',
            'mobile' => 'required|min: 0|max:10',
            'address' => 'required',
            // 'customer_id_photo' => 'required',
            // 'customer_id_type' => 'required',
            // 'photo' => 'required',
        ]);
        
        $filePath = null;
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $fileName = time() . '' . $file->getClientOriginalName();
            $filePath = $file->storeAs('images', $fileName, 'public');
        }
        
        $IdfilePath = null;
        if ($request->hasFile('customer_id_photo')) {
            $file = $request->file('customer_id_photo');
            $fileName = time() . '' . $file->getClientOriginalName();
            $IdfilePath = $file->storeAs('images', $fileName, 'public');
        }
        
        $customer = new Customer();
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->password = Hash::make($request->password);
        $customer->mobile = $request->mobile;
        $customer->address = $request->address;
        $customer->customer_id_type = $request->customer_id_type;
        $customer->customer_id_photo = $IdfilePath;
        $customer->photo = $filePath;
        $customer->save();
        

        $ref = $request->ref;
        if($ref == 'front'){
            return redirect('register')->with('success','Data has been Store');
        }
            return redirect('admin/customer/create')->with('success','Data has been Store');
    }

    public function show(string $id)
    {
        // dd($id);
        $customer = Customer::find($id);
        return view('customer.show',compact('customer'));
    }


    public function edit(string $id)
    {
        // dd($id);
        $customer = Customer::find($id);
        return view('customer.edit',compact('customer'));
    }

 
    public function update(Request $request, string $id)
    {
        // dd($request);

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:customers',
            'password' => 'required',
            'mobile' => 'required|min:10|max:10',
            'address' => 'required',
            'customer_id_photo' => 'required',
            'customer_id_type' => 'required',
            'photo' => 'required',
        ]);
 
        $file = $request->file('photo');
        $fileName = time() . '' . $file->getClientOriginalName();
        $filePath = $file->storeAs('images', $fileName, 'public');

        $file = $request->file('customer_id_photo');
        $fileName = time() . '' . $file->getClientOriginalName();
        $IdfilePath = $file->storeAs('images', $fileName, 'public');


        $customer = Customer::find($id);
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->password = Hash::make($request->password);
        $customer->mobile = $request->mobile;
        $customer->address = $request->address;
        $customer->customer_id_type = $request->customer_id_type;
        $customer->customer_id_photo = $IdfilePath;
        $customer->photo = $filePath;
        $customer->update();

        return redirect('admin/customer/' .$id.'/edit')->with('success','Data has been Update');
    }

    public function login()
    {
        return view('frontlogin');
    }

    public function customer_login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        
        $email = $request->email;
        
        $customer = Customer::where('email', $email)->first();

        if ($customer && Hash::check($request->password, $customer->password)) {
            session(['customerlogin' => true, 'customer_id' => $customer->id]);
            return redirect('/');
        } else {
            return redirect()->back()->with('error', 'Invalid email/password !!');
        }
        
        
    }

    public function register()
    {
        return view('register');
    }

    public function logout()
    {
        session()->forget(['customerlogin','data']);
        return redirect('login');
    }

    public function destroy(string $id)
    {
        // dd($id);
        $customer = Customer::find($id);
        $customer->delete();
        return redirect('admin/customer');
    }
}
