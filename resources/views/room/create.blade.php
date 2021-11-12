@extends('layout')
@section('content')
<div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Add Room
                    <a href="{{url('admin/room')}}" class="btn btn-success btn-sm float-right" >View All</a>
                </h6>
            </div>
            <div class="card-body">

                @if(Session::has('success'))
                    <p class="text-success" style="margin-left:300px;" >{{session('success')}}</p>
                @endif

                <div class="table-responsive">
                    <form method="post" action="{{url('admin/room')}}">
                        @csrf
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <tr>
                                <th>Select Room Type</th>
                                <td>
                                    <select class="form-control" name="roomtype_id">
                                        <option value="0">--- Chose One ---</option>
                                        @forelse($roomTypes as $roomType)
                                            <option value="{{$roomType['id']}}">{{$roomType['title']}}</option>
                                            @empty

                                        @endforelse
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th>Title</th>
                                <td><input name="title" type="text" class="form-control" /></td>
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