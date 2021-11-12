@extends('frontlayout')
    @section('content')
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{asset('img/slider-imgs/banner.jpg')}}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{asset('img/slider-imgs/banner1.jpg')}}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{asset('img/slider-imgs/banner2.jpg')}}" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <div class="container">
            <h1 class="text-center text-success border-bottom">Services</h1>
            <div class="row">
                <div class="col-md-4">
                    <img src="{{asset('img/services-imgs/food.jpg')}}" alt="" class="img-thumbnail">
                </div>
                <div class="col-md-8">
                    <h3>Service heading</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde laborum saepe aliquam iste aperiam aspernatur? Beatae dignissimos eius ipsa deleniti voluptatem, harum suscipit dolor voluptatum aut cupiditate deserunt sunt fugit?</p>
                    <p>
                        <a href="#" class="btn btn-primary btn-sm">Read More</a>
                    </p>
                </div>
            </div>
        </div>

        <div class="container">
            <h1 class="text-center text-success border-bottom">Gallery</h1>
            <div class="row my-3">
                @forelse($data as $roomType)
                    <div class="col-md-3">
                        <div class="card">
                            <h6 class="card-header">{{$roomType['title']}}</h6>
                            <div class="card-body">
                                    @forelse($roomType['roomtypeimgs'] as $index=>$roomTypeImg)
                                        <a href="{{asset('storage/room_types/'.$roomTypeImg['img_src'])}}" data-lightbox="rgallery{{$roomTypeImg['room_type_id']}}">
                                        <!-- @if($index == 0)
                                            <img class="img-fluid" src="{{asset('storage/room_types/'.$roomTypeImg['img_src'])}}" alt="">
                                        @else
                                        <img class="img-fluid hide" src="{{asset('storage/room_types/'.$roomTypeImg['img_src'])}}" alt="">
                                        @endif -->

                                        @if($loop->first)
                                            <img class="img-fluid" src="{{asset('storage/room_types/'.$roomTypeImg['img_src'])}}" alt="">
                                        @endif

                                        </a>
                                    @empty
                                        No Image Found
                                    @endforelse
                            </div>
                        </div>
                    </div>
                @empty
                    Content Not availble
                @endforelse
            </div>
        </div>
        <style>
            .hide{
                display: none;
            }
        </style>
        <link href="{{asset('vendor/lightbox/src/css/lightbox.css')}}" rel="stylesheet"/>
        <script type="text/javascript" src="{{asset('vendor/lightbox/src/js/lightbox.js')}}"></script>
    @endsection
