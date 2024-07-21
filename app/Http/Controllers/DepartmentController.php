<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;

class DepartmentController extends Controller
{
    public function index()
    {
        $department = Department::all();
        return view('department.index', compact('department'));
    }

    public function create()
    {
        return view('department.create');
    }

    public function store(Request $request)
    {
        // dd($request);

        $request->validate([
            'title'=>'required',
            'detail'=>'required',
        ]);
        
        $roomtype = new Department();
        $roomtype->title = $request->title;
        $roomtype->detail = $request->detail;
        $roomtype->save();

        return redirect('admin/department/create')->with('success', 'Data has been Saved Successfully');
    }

    public function show($id)
    {
        // dd($id);
        $department = Department::find($id);
        return view('department.show', compact('department'));
    }

    public function edit($id)
    {
        // dd($id);
        $department = Department::find($id);
        return view('department.edit', compact('department'));
    }
    public function update(Request $request, $id)
    {
        // dd($request);
        $request->validate([
            'title'=>'required',
            'detail'=>'required',
        ]);

        $department = Department::find($id);
        $department->title = $request->title;
        $department->detail = $request->detail;
        $department->update();

        return redirect('admin/department/' . $id . '/edit')->with('success','Data has Been Updated Successfully');;
    }

    public function destroy($id)
    {
        // dd($id);
        $department = Department::find($id);
        $department->delete();
        return redirect('admin/department/');
    }
}
