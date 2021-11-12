@extends('layout')
@section('content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Customers
                    <a href="{{url('admin/customer/create')}}" class="btn btn-success btn-sm float-right" >Add New</a>
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
                                <th>Customer Name</th>
                                <th>Room/Type</th>
                                <th>Check-In</th>
                                <th>Check-Out</th>
                                <th>Adults</th>
                                <th>Childs</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            use Carbon\Carbon;
                        ?>
                            @forelse($data as $item)
                                <tr>
                                    <td>{{$item['bookingInfo']['id']}}</td>
                                    <td>{{$item['bookingInfo']['customer']['full_name']}}</td>
                                    <td>{{$item['bookingInfo']['room']['title']}} / {{$item['roomType'][0]['title']}}</td>
                                    <td>{{Carbon::parse($item['bookingInfo']['checkin_date'])->format('d-m-y')}}</td>
                                    <td>{{$item['bookingInfo']['checkout_date']}}</td>
                                    <td>{{$item['bookingInfo']['total_adults']}}</td>
                                    <td>{{$item['bookingInfo']['total_child']}}</td>
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