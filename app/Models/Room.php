<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\FuncCall;

class Room extends Model
{
    use HasFactory;

    public function RoomType(){
        return $this->belongsTo(RoomType::class,'roomtype_id');
    }
}
