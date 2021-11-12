@extends('layout')
@section('content')
<div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Customers
                    <a href="{{url('admin/customer')}}" class="btn btn-success btn-sm float-right" >View All</a>
                </h6>
            </div>
            <div class="card-body">

                @if(Session::has('success'))
                    <p class="text-success" style="margin-left:300px;" >{{session('success')}}</p>
                @endif

                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <tr>
                            <th>Name</th>
                            <td><input type="text" class="form-control" value="{{$data['full_name']}}" readonly /></td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td><input type="text" class="form-control" value="{{$data['email']}}" readonly /></td>
                        </tr>
                        <tr>
                            <th>Mobile</th>
                            <td><input type="text" class="form-control" value="{{$data['mobile']}}" readonly /></td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td><input type="text" class="form-control" value="{{$data['address']}}" readonly /></td>
                        </tr>

                        <tr>
                            <td>
                                <th>Image</th>
                                <img src="{{asset('storage/customers/'.$data['photo'])}}" style="width: 100px;" />
                            </td>
                        </tr>

                        <tr>
                            <td><a href="{{url('admin/customer')}}" class="btn btn-success btn-sm float-right" >View All</a></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection