@extends('layout')
@section('content')
<div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Add Staff Payment
                    <a href="{{route('all.payments',$staff_id)}}" class="btn btn-success btn-sm float-right">View All</a>
                </h6>
            </div>
            <div class="card-body">

                @if(Session::has('success'))
                    <p class="text-success" style="margin-left:300px;" >{{session('success')}}</p>
                @endif

                <div class="table-responsive">
                    <form method="post" action="{{url('admin/staff/payment/'.$staff_id)}}">
                        @csrf
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <tr>
                                <th>Amount</th>
                                <td><input name="amount" type="text" class="form-control" /></td>
                            </tr>

                            <tr>
                                <th>Payment Date</th>
                                <td><input name="payment_date" type="date" class="form-control" /></td>
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