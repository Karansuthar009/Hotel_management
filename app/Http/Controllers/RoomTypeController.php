<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoomType;
use App\Models\Roomtypeimage;
use Illuminate\Support\Facades\Storage;

class RoomTypeController extends Controller
{
    public function index()
    {
        $roomtype = RoomType::all();
        $photo = Roomtypeimage::all();
        // dd($roomtype);
        return view('roomtype.index', compact('roomtype','photo'));
    }

    public function create()
    {
        return view('roomtype.create');
    }

    public function store(Request $request)
    {
        // dd($request);

        $request->validate([
            'title'=>'required',
            'price'=>'required|numeric',
            'detail'=>'required',
        ]);

        $roomtype = new Roomtype();
        $roomtype->title = $request->title;
        $roomtype->price = $request->price;
        $roomtype->detail = $request->detail;
        $roomtype->save();

        foreach($request->file('photo') as $photo){
            $imgPath = $photo->getClientOriginalName();
            $photo->storeAs('public/images', $imgPath);

            $imgData = new Roomtypeimage();
            $imgData->room_type_id = $roomtype->id;
            $imgData->img_src = $imgPath;
            $imgData->img_alt = $request->title;
            $imgData->save();
        }

        return redirect('admin/roomtype/create')->with('success', 'Data has been Saved Successfully');
    }

    public function show($id)
    {
        // dd($id);
        $roomtype = RoomType::find($id);
        $photo = Roomtypeimage::all();
        // dd($photo);
        return view('roomtype.show', compact('roomtype','photo'));
    }

    public function edit($id)
    {
        // dd($id);
        $roomtype = RoomType::find($id);
        return view('roomtype.edit', compact('roomtype'));
    }
    public function update(Request $request, $id)
    {
        // dd($request);

        $request->validate([
            'title'=>'required',
            'price'=>'required|numeric',
            'detail'=>'required',
        ]);
        
        $roomtype = RoomType::find($id);
        $roomtype->title = $request->title;
        $roomtype->price = $request->price;
        $roomtype->detail = $request->detail;
        $roomtype->update();

        
        foreach($request->file('photo') as $photo){
            $imgPath = $photo->getClientOriginalName();
            $photo->storeAs('public/images', $imgPath);

            $imgData = new Roomtypeimage();
            $imgData->room_type_id = $roomtype->id;
            $imgData->img_src = $imgPath;
            $imgData->img_alt = $request->title;
            $imgData->save();
        }
        return redirect('admin/roomtype/' . $id . '/edit')->with('success','Data has Been updated');;
    }

    public function destroy($id)
    {
        // dd($id);
        $roomtype = RoomType::find($id);
        $roomtype->delete();
        return redirect('admin/roomtype/')->with('success','Data has been Deleted');
    }

    public function destroy_photo($photo_id)
    {
        // dd($photo_id);
        $photos = Roomtypeimage::where('id',$photo_id)->first();
        Storage::delete($photos->img_src);
        Roomtypeimage::where('id', $photo_id)->delete();
        return response()->json(['bool' => true]);
        
    }
}
