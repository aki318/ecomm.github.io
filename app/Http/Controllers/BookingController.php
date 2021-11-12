<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Booking;
use App\Models\RoomType;
use App\Models\Room;

class BookingController extends Controller{

    public function index(){
        $result = Booking::with('customer')->with('room')->get();
        
        $data =[];
        foreach($result as $index=>$info){
            $roomType = RoomType::select('title')->where(['id'=>$result[$index]['room']['roomtype_id']])->get();
            $data[] = ['bookingInfo'=>$info,"roomType"=>$roomType];
        }
        // Log::alert('msg',[$data[0]['bookingInfo']['customer_id']]);
        return view('booking.index',["data"=>$data]);
    }

    public function create(){
        $result['data'] = Customer::all();
        return view('booking.create',$result);
    }

    public function store(Request $req){
        $model = new Booking;

        $model->customer_id   = $req->customer_id; 
        $model->room_id       = $req->room_id;
        $model->checkin_date  = $req->checkin_date;
        $model->checkout_date = $req->checkout_date;
        $model->total_adults  = $req->total_adults;
        $model->total_child   = $req->total_child;
        $model->save();
        
        return redirect('admin/booking/create')->with('success','Data has been submitted :) ');
    }

    public function show($id){

    }

    public function edit($id){

    }

    public function update(Request $request, $id){

    }

    public function destroy($id){

    }

    public function availbleRoom(Request $req , $checkin_date,$checkout_date){
        $arooms = DB::SELECT(" SELECT * FROM rooms WHERE id NOT IN(SELECT room_id FROM bookings WHERE '$checkin_date' BETWEEN checkin_date AND checkout_date OR '$checkout_date' BETWEEN checkin_date AND checkout_date) ");

        $data =[];

        foreach($arooms as $room){
            $roomtypes = RoomType::find($room->roomtype_id);
            $data[] =["rooms"=>$room,"roomtype"=>$roomtypes];
        }
        
        return response()->json(['data'=>$data]);
        // return response()->json(['data'=>$arooms]);
    }

    public function roomPrice(Request $req,$roomId){
        $roomPrice = Room::select('price')->where(["id"=>$roomId])->get();
        return response()->json(["rp"=>$roomPrice]);
    }
    

    public function booking(){
        return view('front-booking');
    }
}
