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
                <form method="post" action="{{url('admin/roomtype/'.$roomType['id'])}}">
                    @csrf
                    @method('PUT')
                    <input name="title" style="margin: 5px; border-radius:5px" type="text" class="form-control" value="{{$roomType['title']}}" />
                    <input name="price" type="text" class="form-control" value="{{$roomType['price']}}" />
                    <textarea name="detail" class="form-control" >{{$roomType['detail']}}</textarea>
                    <table class="table table-bordered">
                        <tr>
                            <td>Gallery</td>
                            @forelse($roomType->roomtypeimgs as $img)
                                <td class="imgcol{{$img['id']}}">
                                    <img src="{{asset('storage/room_types/'.$img['img_src'])}}" width="80px" height="80px" />
                                    <p class="mt-2">
                                        <button type="button" class="btn btn-danger btn-sm delete-img" data-img-id="{{$img->id}}" onclick="return confirm('Are You Sure Want To Delete')">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </p>
                                </td>
                            @empty
                                No Image To Show
                            @endforelse
                        </tr>
                    </table>
                    <button type="submit" class="btn btn-primary">Edit</button>
                </form>
            </div>
        </div>
    </div>
    @section('scripts')
        <script type="text/javascript">
            $(document).ready(function(){
                $(".delete-img").on('click',function(){
                    let imgId = $(this).attr('data-img-id');
                    let _vm   = $(this);
                    $.ajax({
                        url:`{{url('admin/roomtypeimg/${imgId}/delete')}}`,
                        dataType:'json',
                        beforeSend:function(){
                            _vm.addClass('disabled');
                        },
                        success:function(res){
                            console.log(res);
                            $(`.imgcol${imgId}`).remove();
                            _vm.removeClass('disabled');
                        }
                    });
                });
            });
        </script>
    @endsection
@endsection