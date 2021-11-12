<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoomType;
use App\Models\Roomtypeimage;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\DB;

class RoomtypeController extends Controller{

    public function index(){
        $data['roomTypes'] = RoomType::get();
        // Log::alert(['msg',$data['roomTypes']['roomtypeimgs']['img_src']]);
        return view('roomtype.index',$data);
    }

    public function create(){
        return view('roomtype.create');
    }

    public function store(Request $req){
        $model = new RoomType;
        $model->title  = $req->title;
        $model->price  = $req->price;
        $model->detail = $req->detail;
        $model->save();

        $roomTypeImg = new Roomtypeimage;
        
        if($req->hasFile('img_src')){
            $imgs = $req->file('img_src');
            $totImgs = count($imgs);

            for($i=0;$i<$totImgs;$i++){

                $ext      = $imgs[$i]->extension();
                $img_name = time().$i.'.'.$ext;

                $imgs[$i]->storeAs('/public/room_types',$img_name);

                DB::table('roomtypeimages')->insert([
                    "room_type_id"=>$model->id,
                    "img_src"=>$img_name,
                    "img_alt"=>$model->title
                ]);
            }
        }
        return redirect('admin/roomtype/create')->with('success','Data has been submitted :) ');
    }

    public function show($id){
        $data['roomType'] = RoomType::find($id);
        return view('roomtype.show',$data);
    }

    public function edit($id){
        $data['roomType'] = RoomType::find($id);
        return view('roomtype.edit',$data);
    }

    public function update(Request $req, $id){
        $data = RoomType::find($id);
        $data->title  = $req->title;
        $data->price  = $req->price;
        $data->detail = $req->detail;
        $data->save();
        return redirect('admin/roomtype');
    }

    public function destroy($id){
        RoomType::find($id)->delete();
        return redirect('admin/roomtype')->with('success','Data Deleted');
    }

    public function destroy_img($img_id){
        $data = Roomtypeimage::where(["id"=>$img_id])->first();
        // return response()->json(['img'=>$data]);
        // Storage::delete('storage/room_types/'.$data->img_src);
        unlink(storage_path(('app/public/room_types/'.$data->img_src)));
        Roomtypeimage::where('id','=',$img_id)->delete();
        return response()->json(['bool'=>true]); 
               
    }
}
