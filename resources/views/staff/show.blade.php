@extends('layout')
@section('content')
<div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Staff
                    <a href="{{url('admin/staff')}}" class="btn btn-success btn-sm float-right" >View All</a>
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
                            <td>{{$data['full_name']}}</td>
                        </tr>
                        <tr>
                            <th>Dep. Name</th>
                            <td>{{$data['department']['title']}}</td>
                        </tr>
                        <tr>
                            <th>Bio</th>
                            <td>{{$data['bio']}}</td>
                        </tr>
                        <tr>
                            <th>Sakary Type</th>
                            <td>{{$data['salary_type']}}</td>
                        </tr>
                        <tr>
                            <th>Salary</th>
                            <td>{{$data['salary_amt']}}</td>
                        </tr>
                        <tr>
                            <th>Gallery</th>
                            <td>
                                <img src="{{asset('storage/staff/'.$data['photo'])}}" height="80px" width="80px" />
                            </td>
                        </tr>

                        <tr>
                            <td><a href="{{url('admin/staff')}}" class="btn btn-success btn-sm float-right" >View All</a></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection