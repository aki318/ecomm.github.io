<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Booking;
use App\Models\RoomType;


class FrontController extends Controller{

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

    public function login(){
        return view('customer_login');
    }

    public function checkLogin(Request $req){
        $customer = Customer::where(['email'=>$req->email])->where(['password'=>$req->password])->first();
        if($customer){
            session(['customerData'=>$customer]);
            return redirect('booking');
        }
    }
}
