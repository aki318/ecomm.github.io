@extends('layout')
@section('content')
<div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Room
                    <a href="{{url('admin/roomtype')}}" class="btn btn-success btn-sm float-right" >View All</a>
                </h6>
            </div>
            <div class="card-body">

                @if(Session::has('success'))
                    <p class="text-success" style="margin-left:300px;" >{{session('success')}}</p>
                @endif

                <div class="table-responsive">
                    <form method="post" action="{{url('admin/roomtype')}}">
                        @csrf
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <tr>
                                <th>Title</th>
                                <td><input name="title" type="text" class="form-control" value="{{$room['title']}}" /></td>
                            </tr>
                            <tr>
                                <th>Room Type</th>
                                <td>
                                    <input name="title" type="text" class="form-control" value="{{$room['RoomType']['title']}}" />
                                </td>
                            </tr>
                            <tr>
                                <td><a href="{{url('admin/roomtype')}}" class="btn btn-success btn-sm float-right" >View All</a></td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection