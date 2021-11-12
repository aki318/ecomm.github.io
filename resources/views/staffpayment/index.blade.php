@extends('layout')
@section('content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Payment of {{$data['full_name']}}
                    <a href="#" class="btn btn-success btn-sm float-right" >Add New</a>
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
                                <th>Payments</th>
                                <th>Payment Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        @php
                            use Carbon\Carbon;
                        @endphp
                        <tbody>
                            @forelse($data['staffpayments'] as $payment)
                                <tr>
                                    <td>{{$data['id']}}</td>
                                    <td>{{$data['full_name']}}</td>
                                    <td>{{$payment['amount']}}</td>
                                    <td>{{Carbon::parse($payment['payment_date'])->format('d-m-y')}}</td>
                                    <td>
                                        <a href="{{url('admin/staff/'.$payment['id'])}}" class="btn btn-info btn-sm">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a href="{{url('admin/staff/'.$payment['id'].'/edit')}}" class="btn btn-primary btn-sm">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="{{url('admin/staff/payment/'.$payment['id'].'/add')}}" class="btn btn-dark btn-sm">
                                            <i class="fa fa-credit-card"></i>
                                        </a>
                                        <a href="{{url('admin/staff/'.$payment['id'].'/delete')}}" class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>
                            @empty
                                No Payments Found
                                </tr>
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