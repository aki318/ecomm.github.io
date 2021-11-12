<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;

class StaffDepartmentController extends Controller{

    public function index(){
        $result['data'] = Department::get();
        return view('department.index',$result);
    }

    public function create(){
        return view('department.create');
    }

    public function store(Request $req){
        $model = new Department;
        $model->title   = $req->title;
        $model->detail  = $req->detail;
        $model->save();
        return redirect('admin/department/create')->with('success','Data has been submitted :) ');
    }

    public function show($id){
        $result['data'] = Department::find($id);
        return view('department.show',$result);
    }

    public function edit($id){
        $result['data'] = Department::find($id);
        return view('department.edit',$result);
    }

    public function update(Request $req, $id){
        $data = Department::find($id);
        $data->title  = $req->title;
        $data->detail = $req->detail;
        $data->save();
        return redirect('admin/department');
    }

    public function destroy($id){
        Department::find($id)->delete();
        return redirect('admin/department')->with('success','Data Deleted');
    }
}
