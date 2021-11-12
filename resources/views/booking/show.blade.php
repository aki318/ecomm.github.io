@extends('layout')
@section('content')
<div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Booking
                    <a href="{{url('admin/booking')}}" class="btn btn-success btn-sm float-right" >View All</a>
                </h6>
            </div>
            <div class="card-body">

                @if(Session::has('success'))
                    <p class="text-success" style="margin-left:300px;" >{{session('success')}}</p>
                @endif

                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <tr>
                            <th>Customer Name</th>
                            <td><input name="title" type="text" class="form-control" value="{{$room['title']}}" /></td>
                        </tr>
                        <tr>
                            <th>Room/Type</th>
                            <td>
                                <input name="title" type="text" class="form-control" value="{{$room['RoomType']['title']}}" />
                            </td>
                        </tr>
                        <tr>
                            <th>Check-In</th>
                            <td><input name="title" type="text" class="form-control" value="{{$room['title']}}" /></td>
                        </tr>
                        <tr>
                            <th>Check-Out</th>
                            <td><input name="title" type="text" class="form-control" value="{{$room['title']}}" /></td>
                        </tr>
                        <tr>
                            <th>Adults</th>
                            <td><input name="title" type="text" class="form-control" value="{{$room['title']}}" /></td>
                        </tr>
                        <tr>
                            <th>Child</th>
                            <td><input name="title" type="text" class="form-control" value="{{$room['title']}}" /></td>
                        </tr>
                        <tr>
                            <td><a href="{{url('admin/roomtype')}}" class="btn btn-success btn-sm float-right" >View All</a></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection