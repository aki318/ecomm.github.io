<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Staff;
use App\Models\StaffPayment;
use Illuminate\Support\Facades\Log;

class StaffController extends Controller{
    
    public function index(){
        $result['data'] = Staff::with('department')->get();
        return view('staff.index',$result);
    }

    public function create(){
        $result['data'] = Department::get();
        return view('staff.create',$result);
    }

    public function store(Request $req){
        $model = new Staff;

        if($req->hasFile('photo')){
            $image    = $req->file('photo');
            $ext      = $image->extension();
            $img_name = time().'.'.$ext;
            $image->storeAs('public/staff',$img_name);
            $model->photo = $img_name;
        }

        $model->full_name      = $req->full_name;
        $model->department_id  = $req->department_id;
        $model->bio            = $req->bio;
        $model->salary_type    = $req->salary_type;
        $model->salary_amt     = $req->salary_amt;
        $model->save();
        return redirect('admin/staff/create')->with('success','Data has been submitted :) ');
    }

    public function show($id){
        $result['data'] = Staff::find($id);
        return view('staff.show',$result);
    }

    public function edit($id){
        $result['data'] = Staff::find($id);
        $result['dept'] = Department::get();
        return view('staff.edit',$result);
    }

    public function update(Request $req, $id){
         $model = Staff::find($id);

        if($req->hasFile('photo')){

            // if(file_exists(storage_path('app/public/staff/'.$model['photo']))){
            //     unlink(storage_path('app/public/staff/'.$model['photo']));
            // }

            $image    = $req->file('photo');
            $ext      = $image->extension();
            $img_name = time().'.'.$ext;
            $image->storeAs('public/staff',$img_name);
            $model->photo = $img_name;
        }

        $model->full_name      = $req->full_name;
        $model->department_id  = $req->department_id;
        $model->bio            = $req->bio;
        $model->salary_type    = $req->salary_type;
        $model->salary_amt     = $req->salary_amt;
        $model->save();
        return redirect('admin/staff')->with('success','Data has been updated :) ');
    }

    public function destroy($id){
        Staff::find($id)->delete();
        return redirect('admin/staff')->with('success','Data Deleted');
    }

    public function addPayment($id){
        return view('staffpayment.create',['staff_id'=>$id]);
    }

    public function savePayment(Request $req,$id){
        $model = new StaffPayment;
        $result = Staff::find($id);
        $model->staff_id      = $result['id'];
        $model->amount        = $req->amount;
        $model->payment_date  = $req->payment_date;
        $model->save();
        return redirect('admin/staff');
    }

    public function allPayments($id){
        // $result['data'] = StaffPayment::with('staff')->where('staff_id','=',$id)->get();
        $result['data'] = Staff::with('staffpayments')->find($id);
        // Log::alert('msg',[$result['data']]);
        return view('staffpayment.index',$result);
    }
}
