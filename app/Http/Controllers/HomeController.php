<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\RoomType;
use App\Models\Roomtypeimage;

class HomeController extends Controller{
    public function home(){
        $result['data'] = RoomType::with('roomtypeimgs')->get();
        // log::alert('msg',array($result['data']));
        return view("home",$result);
    }
}
