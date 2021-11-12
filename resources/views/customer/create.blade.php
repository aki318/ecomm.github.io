@extends('layout')
@section('content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Add Customer
                    <a href="{{url('admin/roomtype')}}" class="btn btn-success btn-sm float-right" >View All</a>
                </h6>
            </div>

                @if(Session::has('success'))
                    <p class="text-success" style="margin-left:300px;" >{{session('success')}}</p>
                @endif

                <div class="container">
                    <form method="post" action="{{url('admin/customer')}}" enctype="multipart/form-data">
                        @csrf
                        <input name="full_name" type="text" class="form-control" placeholder="Name" />
                        <br/>
                        <input name="email" type="text" class="form-control" placeholder="Email" />
                        <br/>
                        <input name="password" type="text" class="form-control" placeholder="Password" />
                        <br/>
                        <input name="mobile" type="text" class="form-control" placeholder="Mobile" />
                        <br/>
                        <textarea name="address" class="form-control" placeholder="Address"></textarea>
                        <br/>
                        <input name="photo" type="file" class="form-control"/>
                        <br/>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
        </div>
</div>
@endsection