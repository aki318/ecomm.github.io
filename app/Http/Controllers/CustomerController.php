<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller{

    public function index(){
        $result['data'] = Customer::get();
        return view('Customer.index',$result);
    }

    public function create(){
        $data['customer'] = Customer::all();
        return view('Customer.create',$data);
    }

    public function store(Request $req){
        $model = new Customer;

        if($req->hasFile('photo')){
            $image = $req->file('photo');
            $ext = $image->extension();
            $img_name = time().'.'.$ext;
            $image->storeAs('public/customers',$img_name);
            $model->photo = $img_name; 
        }

        $model->full_name = $req->full_name;
        $model->email     = $req->email;
        $model->password  = $req->password;
        $model->mobile    = $req->mobile;
        $model->address   = $req->address;

        $model->save();
        return redirect('admin/customer/create')->with('success','Data has been submitted :) ');
        
    }

    public function show($id){
        $result['data'] = Customer::find($id);
        return view('Customer.show',$result);
    }

    public function edit($id){
        $result['data'] = Customer::find($id);
        return view('Customer.edit',$result);
    }

    public function update(Request $req, $id){
        $data = Customer::find($id);

        if($req->hasFile('photo')){
            $image = $req->file('photo');
            $ext = $image->extension();
            $img_name = time().'.'.$ext;
            $image->storeAs('public/customers',$img_name);
            $data->photo = $img_name; 
        }

        $data->full_name = $req->full_name;
        $data->email     = $req->email;
        $data->password  = $req->password;
        $data->mobile    = $req->mobile;
        $data->address   = $req->address;

        $data->save();
        return redirect('admin/customer');
    }

    public function destroy($id){
        Customer::find($id)->delete();
        return redirect('admin/customer')->with('success','Data Deleted');
    }

    public function customer_login(){
        return view('customerLogin');
    }

    public function checkCuslogin(Request $req){
        $customer = Customer::where(['email'=>$req->email])->where(['password'=>$req->password])->first();
        if($customer){
            session(['customerData'=>$customer]);
            return redirect('booking');
        }
        else{
            return redirect()->to('customer.login')->with('msg','email or password is incorrect');
        }
    }
}
