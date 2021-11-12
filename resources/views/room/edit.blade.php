@extends('layout')
@section('content')
    <div class="container-fluid"  style="min-height:15px;">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Room
                    <a href="{{url('admin/room')}}" class="btn btn-success btn-sm float-right" >View All</a>
                </h6>
            </div>
            <div>
                <form method="post" action="{{url('admin/room/'.$room['id'])}}">
                    @csrf
                    @method('PUT')
                    <select class="form-control" name="roomtype_id">
                        <option value="0">--- Chose One ---</option>
                        @forelse($roomTypes as $roomType)
                            <option value="{{$roomType['id']}}" {{$roomType['id'] == $room['roomtype_id']?"selected":null }} >{{$roomType['title']}}</option>
                            @empty

                        @endforelse
                    </select>
                    <input name="title" style="margin:5px;" type="text" class="form-control" value="{{$room['title']}}" />
                    <button type="submit" class="btn btn-primary">Edit</button>
                </form>
            </div>
        </div>
    </div>
@endsection