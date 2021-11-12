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
                <form method="post" action="{{url('admin/department/'.$data['id'])}}">
                    @csrf
                    @method('PUT')
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <tr>
                            <th>Title</th>
                            <td><input name="title" type="text" class="form-control" value="{{$data['title']}}" /></td>
                        </tr>
                        <tr>
                            <th>Detail</th>
                            <td><textarea name="detail" class="form-control">{{$data['detail']}}</textarea></td>
                        </tr>
                    </table>
                    <button type="submit" class="btn btn-primary">Edit</button>
                </form>
            </div>
        </div>
    </div>
@endsection