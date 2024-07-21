<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index() 
    {
        $service = Service::all();
        return view('service.index',['service'=>$service]);
    }

    public function create() 
    {
        return view('service.create');
    }

    public function store(Request $request) 
    {
        // dd($request);

        $request->validate([
            'title'=>'required',
            'small_detail'=>'required',
            'full_detail'=>'required',
            'photo'=>'required',
        ]);

        $file = $request->file('photo');
        $fileName = time() . '' . $file->getClientOriginalName();
        $filePath = $file->storeAs('images', $fileName, 'public');

        $service = new Service();
        $service->title = $request->title;
        $service->small_detail = $request->small_detail;
        $service->full_detail = $request->full_detail;
        $service->photo = $filePath;
        $service->save();

        return redirect('admin/service')->with('success','Data Saved Successfully');
    }

    public function show($id) 
    {
        // dd($id);
        $service = Service::find($id);
        return view('service.show',['service'=>$service]);
    }

    public function edit($id) 
    {
        // dd($id);
        $service = Service::find($id);
        return view('service.edit',['service'=>$service]);
    }
    public function update(Request $request ,$id)
    {
        // dd($request);

        $request->validate([
            'title'=>'required',
            'small_detail'=>'required',
            'full_detail'=>'required',
            'photo'=>'required',
        ]);

        $file = $request->file('photo');
        $fileName = time() . '' . $file->getClientOriginalName();
        $filePath = $file->storeAs('images', $fileName, 'public');

        $service = Service::find($id);
        $service->title = $request->title;
        $service->small_detail = $request->small_detail;
        $service->full_detail = $request->full_detail;
        $service->photo = $filePath;
        $service->update();

        return redirect('admin/service')->with('success','Data Updated Successfully');
    }

    public function destroy($id)
    {
        // dd($id);
        $service = Service::find($id);
        $service->delete();
        return redirect('admin/service/');
    }

}
