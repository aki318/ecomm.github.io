@extends('layout')
@section('content')
    <div class="container-fluid"  style="min-height:15px;">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit Department
                    <a href="{{url('admin/department')}}" class="btn btn-success btn-sm float-right" >View All</a>
                </h6>
            </div>
            <div>
            <form method="post" action="{{url('admin/staff/'.$data['id'])}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <tr>
                                <th>Name</th>
                                <td><input name="full_name" type="text" class="form-control" value="{{$data['full_name']}}" /></td>
                            </tr>

                            <tr>
                                <th>Seletc Department</th>
                                <td>
                                    <select name="department_id" class="form-control">
                                        <option value="">--- Seletc One ---</option>
                                        @forelse($dept as $item)
                                            <option value="{{$item['id']}}" {{ $item['id'] == $data['department_id']?'selected':null }} >{{$item['title']}}</option>
                                        @empty
                                            No Department Found
                                        @endforelse
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th>Bio</th>
                                <td><input name="bio" type="text" class="form-control" value="{{$data['bio']}}" /></td>
                            </tr>
                            <tr>
                                <th>Salary Type</th>
                                <td><input name="salary_type" type="text" class="form-control" value="{{$data['salary_type']}}" /></td>
                            </tr>
                            <tr>
                                <th>Salary Amount</th>
                                <td><input name="salary_amt" type="text" class="form-control" value="{{$data['salary_amt']}}" /></td>
                            </tr>

                            <tr>
                                <th>Photo</th>
                                <td><input name="photo" type="file" class="form-control" /></td>
                                <td><img src="{{asset('storage/staff/'.$data['photo'])}}" width="80px" height="80px"/></td>
                            </tr>

                            <tr>
                                <td><button type="submit" class="btn btn-primary">Submit</button></td>
                            </tr>
                        </table>
                    </form>
            </div>
        </div>
    </div>
@endsection