@extends('layout')
@section('content')
    <div class="container-fluid"  style="min-height:15px;">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Room Type
                    <a href="{{url('admin/roomtype')}}" class="btn btn-success btn-sm float-right" >View All</a>
                </h6>
            </div>
            <div>
                <form method="post" action="{{url('admin/customer/'.$data['id'])}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input name="full_name" type="text" class="form-control" placeholder="Name" value="{{$data['full_name']}}" />
                    <br/>
                    <input name="password" type="text" class="form-control" placeholder="Name" value="{{$data['password']}}" />
                    <br/>
                    <input name="email" type="text" class="form-control" placeholder="Email" value="{{$data['email']}}" />
                    <br/>
                    <input name="mobile" type="text" class="form-control" placeholder="Mobile" value="{{$data['mobile']}}" />
                    <br/>
                    <textarea name="address" class="form-control" placeholder="Address">{{$data['address']}}</textarea>
                    <br/>
                    <img src="{{asset('storage/customers/'.$data['photo'])}}" style="width: 100px;">
                    <input name="photo" type="file" class="form-control"/>
                    <br/>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection