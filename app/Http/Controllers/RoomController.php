<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\RoomType;

class RoomController extends Controller{

    public function index(){
        $data['rooms'] = Room::get();
        return view('room.index',$data);
    }

    public function create(){
        $data['roomTypes'] = RoomType::all();
        return view('room.create',$data);
    }

    public function store(Request $req){
        $model = new Room;
        $model->roomtype_id =$req->roomtype_id;
        $model->title  = $req->title;
        $model->save();
        return redirect('admin/room/create')->with('success','Data has been submitted :) ');
    }

    public function show($id){
        $data['room'] = Room::with('RoomType')->find($id);
        return view('room.show',$data);
    }

    public function edit($id){
        $data['room'] = Room::find($id);
        $data['roomTypes'] = RoomType::all();
        return view('room.edit',$data);
    }

    public function update(Request $req, $id){
        $data = Room::find($id);
        $data->roomtype_id =$req->roomtype_id;
        $data->title  = $req->title;
        $data->save();
        return redirect('admin/room');
    }

    public function destroy($id){
        Room::find($id)->delete();
        return redirect('admin/room')->with('success','Data Deleted');
    }
}
