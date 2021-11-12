@extends('layout')
@section('content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Departments
                    <a href="{{url('admin/staff/create')}}" class="btn btn-success btn-sm float-right" >Add New</a>
                </h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    @if(Session::has('success'))
                        <p class="text-success">{{session('success')}}</p>
                    @endif
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Dep. Id</th>
                                <th>Bio</th>
                                <th>Salary Type</th>
                                <th>Salary Amount</th>
                                <th>Photo</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($data as $item)
                                <tr>
                                    <td>{{$item['id']}}</td>
                                    <td>{{$item['full_name']}}</td>
                                    <td>{{$item['department_id']}}</td>
                                    <td>{{$item['bio']}}</td>
                                    <td>{{$item['salary_type']}}</td>
                                    <td>{{$item['salary_amt']}}</td>
                                    <td>
                                        <img src="{{asset('storage/staff/'.$item['photo'])}}" height="80px" width="80px" />
                                    </td>
                                    <td>
                                        <a href="{{url('admin/staff/'.$item['id'])}}" class="btn btn-info btn-sm">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a href="{{url('admin/staff/'.$item['id'].'/edit')}}" class="btn btn-primary btn-sm">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="{{url('admin/staff/payment/'.$item['id'].'/add')}}" class="btn btn-dark btn-sm">
                                            <i class="fa fa-credit-card"></i>
                                        </a>
                                        <a href="{{url('admin/staff/'.$item['id'].'/delete')}}" class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                    No Data Found
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @section('scripts')
        <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
        <script src="{{asset('js/demo/datatables-demo.js')}}"></script>
    @endsection
@endsection