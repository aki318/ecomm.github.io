@extends('layout')
@section('content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Add Booking
                    <a href="{{url('admin/booking')}}" class="btn btn-success btn-sm float-right" >View All</a>
                </h6>
            </div>

                @if(Session::has('success'))
                    <p class="text-success" style="margin-left:300px;" >{{session('success')}}</p>
                @endif

                <div class="container" style="padding-top:5px">
                    <form method="post" action="{{url('admin/booking')}}" enctype="multipart/form-data">
                        @csrf
                        <select name="customer_id" class="form-control">
                            <option value="">--- Select Customer ---</option>
                            @forelse($data as $item)
                                <option value="{{$item['id']}}">{{$item['full_name']}}</option>
                            @empty
                                No Customer Found
                            @endforelse
                        </select>
                        <br/>
                        <label for="checkin_date">Check In Date</label>
                        <input name="checkin_date" type="date" class="form-control checkin_date" />
                        <br/>
                        <label for="checkout_date">Check Out Date</label>
                        <input name="checkout_date" type="date" class="form-control checkout_date" />
                        <br/>
                        <label for="available_room">Available Room</label>
                        <select name="room_id" class="form-control room_availble">
                            <option value="">select one </option>
                        </select>
                        <br/>
                        <input name="total_adults" class="form-control" placeholder="Total Adults">
                        <br/>
                        <input name="total_child" class="form-control" placeholder="Total Child">
                        <br/>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
        </div>
    </div>

    @section('scripts')
        <script type="text/javascript">
            $(document).ready(function(){
                $(".checkout_date").on('blur',function(){
                    let _checkout_date = $(this).val();
                    let _checkin_date  = $(".checkin_date").val();
                    $.ajax({
                        url:"{{url('admin/booking/availble_rooms')}}/"+_checkin_date+"/"+_checkout_date,
                        dataType:'json',
                        beforeSend:function(){
                            $(".room_availble").html(`<option>--Loading---</option>`);
                        },
                        success:function(resp){
                            let _html = '';
                            $.each(resp.data,function(index,val){
                                _html += `<option value=${val.rooms.id}>${val.rooms.title} - ${val.roomtype.title}</option>`;
                            });
                            $(".room_availble").html(_html);
                        }
                    });
                })
            });
        </script>
    @endsection

@endsection