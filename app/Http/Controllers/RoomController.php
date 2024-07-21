<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use App\Models\RoomType;

class RoomController extends Controller
{
    public function index() 
    {
        $room = Room::all();
        return view('room.index',compact('room'));
    }

    public function create() 
    {
        $roomtype = RoomType::all('title','id');
        return view('room.create',compact('roomtype'));
    }

    public function store(Request $request) 
    {
        // dd($request);

        $request->validate([
            'title'=>'required',
            'room_type_id'=>'required',
        ]);

        $room = new Room();
        $room->title = $request->title;
        $room->room_type_id = $request->room_type_id;
        $room->save();

        return redirect('admin/room')->with('success','Data Saved Successfully');
    }

    public function show($id) 
    {
        // dd($id);
        $room = Room::find($id);
        return view('room.show',compact('room'));
    }

    public function edit($id) 
    {
        // dd($id);
        $room = Room::find($id);
        $roomtype = RoomType::all('title','id');
        return view('room.edit',compact('room','roomtype'));
    }
    public function update(Request $request ,$id)
    {
        // dd($request);

        $request->validate([
            'title'=>'required',
            'room_type_id'=>'required',
        ]);
        
        $room = Room::find($id);
        $room->title = $request->title;
        $room->room_type_id = $request->room_type_id;
        $room->update();

        return redirect('admin/room')->with('success','Data Updated Successfully');
    }

    public function destroy($id)
    {
        // dd($id);
        $room = Room::find($id);
        $room->delete();
        return redirect('admin/room/');
    }

}
