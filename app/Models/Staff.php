<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Department;
use App\Models\StaffPayment;

class Staff extends Model
{
    use HasFactory;
    protected $table = "staffs";

    public function department(){
        return $this->belongsTo(Department::class);
    }

    public function staffpayments(){
        return $this->hasMany(StaffPayment::class);
    }
}
