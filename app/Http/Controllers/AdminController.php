<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Booking;

class AdminController extends Controller{

    public function index(){
        $bookings = Booking::selectRaw('count(id) as total_bookings,checkin_date')->groupBy('checkin_date')->get();

        $lables = [];
        $data   = [];
        foreach($bookings as $booking){
            $lables[] = $booking['checkin_data'];
            $data[]   = $booking['total_bookings'];
        }
        return view('dashboard',["lables"=>$lables,"data"=>$data]);
    }
    
    public function login(){
        return view('login');
    }

    public function check_login(Request $req){
        $admin = Admin::where(['email'=>$req->email])->where(['password'=>$req->password])->first();
        if($admin){
            session(['adminData'=>$admin]);
            return redirect('admin');
        }
        else{
            return redirect('admin/login')->with('msg','email or password is incorrect');
        }
    }

    public function logout(){
        session()->forget(['adminData']);
        return redirect('admin/login');
    }
}
