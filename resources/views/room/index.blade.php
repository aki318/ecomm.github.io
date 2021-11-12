@extends('layout')
@section('content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Room
                    <a href="{{url('admin/room/create')}}" class="btn btn-success btn-sm float-right" >Add New</a>
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
                                <th>Title</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @forelse($rooms as $room)
                                <tr>
                                    <td>{{$room['id']}}</td>
                                    <td>{{$room['title']}}</td>
                                    <td>
                                        <a href="{{url('admin/room/'.$room['id'])}}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                                        <a href="{{url('admin/room/'.$room['id'].'/edit')}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                        <a href="{{url('admin/room/'.$room['id'].'/delete')}}" class="btn btn-danger btn-sm">
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