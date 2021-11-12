@extends('layout')
@section('content')
<div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Add Staff
                    <a href="{{url('admin/staff')}}" class="btn btn-success btn-sm float-right" >View All</a>
                </h6>
            </div>
            <div class="card-body">

                @if(Session::has('success'))
                    <p class="text-success" style="margin-left:300px;" >{{session('success')}}</p>
                @endif

                <div class="table-responsive">
                    <form method="post" action="{{url('admin/staff')}}" enctype="multipart/form-data">
                        @csrf
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <tr>
                                <th>Name</th>
                                <td><input name="full_name" type="text" class="form-control" /></td>
                            </tr>

                            <tr>
                                <th>Seletc Department</th>
                                <td>
                                    <select name="department_id" class="form-control">
                                        <option value="">--- Seletc One ---</option>
                                        @forelse($data as $item)
                                            <option value="{{$item['id']}}">{{$item['title']}}</option>
                                        @empty
                                            No Department Found
                                        @endforelse
                                    </select>
                                </td>
                            </tr>

                            <tr>
                                <th>Photo</th>
                                <td><input name="photo" type="file" class="form-control" /></td>
                            </tr>
                            <tr>
                                <th>Bio</th>
                                <td><input name="bio" type="text" class="form-control" /></td>
                            </tr>
                            <tr>
                                <th>Salary Type</th>
                                <td><input name="salary_type" type="text" class="form-control" /></td>
                            </tr>
                            <tr>
                                <th>Salary Amount</th>
                                <td><input name="salary_amt" type="text" class="form-control" /></td>
                            </tr>
                            <tr>
                                <td><button class="btn btn-primary">Submit</button></td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection