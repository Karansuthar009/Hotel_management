<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use App\Models\Staff;
use App\Models\StaffPayment;

class StaffController extends Controller
{
    public function index()
    {
        $staff = Staff::all();
        return view('staff.index',compact('staff'));
    }


    public function create()
    {
        $department = Department::all();
        return view('staff.create',compact('department'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'department_id'=>'required',
            'bio' => 'required',
            'salary_type' => 'required',
            'salary_amount' => 'required',
            'photo' => 'required',
        ]);
        //  dd($request);

        
        $file = $request->file('photo');
        $fileName = time() . '' . $file->getClientOriginalName();
        $filePath = $file->storeAs('images', $fileName, 'public');

        $staff = new Staff();
        $staff->name = $request->name;
        $staff->department_id = $request->department_id;
        $staff->bio = $request->bio;
        $staff->salary_type = $request->salary_type;
        $staff->salary_amount = $request->salary_amount;
        $staff->photo = $filePath;
        $staff->save();

         return redirect('admin/staff/create')->with('success','Data has been Store');
    }


    public function show(string $id)
    {
        // dd($id);
        $staff = Staff::find($id);
        return view('staff.show',compact('staff'));
    }


    public function edit(string $id)
    {
        // dd($id);
        $staff = Staff::find($id);
        $department = Department::all();
        return view('staff.edit',compact('staff','department'));
    }


    public function update(Request $request, string $id)
    {
        // dd($request);

        $request->validate([
            'name' => 'required',
            'department_id'=>'required',
            'bio' => 'required',
            'salary_type' => 'required',
            'salary_amount' => 'required',
            'photo' => 'required',
        ]);
        
        $file = $request->file('photo');
        $fileName = time() . '' . $file->getClientOriginalName();
        $filePath = $file->storeAs('images', $fileName, 'public');

        $staff = Staff::find($id);
        $staff->name = $request->name;
        $staff->department_id = $request->department_id;
        $staff->bio = $request->bio;
        $staff->salary_type = $request->salary_type;
        $staff->salary_amount = $request->salary_amount;
        $staff->photo = $filePath;
        $staff->update();

        return redirect('admin/staff/' .$id.'/edit')->with('success','Data has been Update Successfully');
    }

    public function destroy(string $id)
    {
        // dd($id);
        $staff = Staff::find($id);
        $staff->delete();
        return redirect('admin/staff/');
    }

    public function add_payment($staff_id)
    {
        // dd($staff_id);
        return view('staff_payment.create',['staff_id'=>$staff_id]);
    }

    public function save_payment(Request $request, $staff_id)
    {
        // dd($staff_id);
        $staffpayment = new StaffPayment();
        $staffpayment->staff_id = $staff_id;
        $staffpayment->amount = $request->amount;
        $staffpayment->payment_date = $request->payment_date;
        $staffpayment->save();
        
        return redirect('admin/staff/payment/' .$staff_id.'/add')->with('success','Data has been Saved Successfully');
    }

    public function all_payment($staff_id)
    {
        // dd($staff_id);
        $staffpayment = StaffPayment::where('staff_id',$staff_id)->get();
        $staff = Staff::all();
        return view('staff_payment.index',compact('staffpayment','staff_id','staff'));
    }

    public function delete_payment($staff_id)
    {
        dd($staff_id);
        $staffpayment = StaffPayment::find($staff_id);
        $staffpayment->delete();
        return redirect('admin/staff/payment/'. $staff_id)->with('success','Data Deleted Successfully');
    }

}
