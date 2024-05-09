@extends('layouts.homelayout')
@section('title', 'Trang chủ')
@section('content')
<section class="home-banner">
    <div class="home-banner__prev"><i class="bi bi-chevron-left"></i></div>
    <div class="home-banner__next"><i class="bi bi-chevron-right"></i></div>
    <div class="swiper-container">

        <div class="swiper-wrapper">
            @foreach($slide as $sl)
            <div class="swiper-slide">
                <div class="home-banner__iwrap">
                    <img src="{{ asset('public/images/' . $sl->image_name) }}" alt="Ảnh Slide">
                </div>
            </div>
            @endforeach 
        </div>
    </div>
</section>
<div class="news-container">
    <h2 class="section-title" style="text-align:center;"><b>Tin chung</b></h2>
    <div class="news-list">
        @foreach($news as $ns)
        @if($ns->loai==0)
        <div class="news-item">
            <a href="{{route('News.chitiettin',$ns->id)}}">
                <img src="{{ asset('public/images/' . $ns->anhdaidien) }}">
                <div class="news-content">
                    <div class="news-title">{{$ns->tieude}}</div>
                    <p>Click vào để xem chi tiết</p> <!-- Nút Xem thêm -->
                </div>
            </a>
        </div>
        @endif
        @endforeach
    </div>
    @if(session()->get('role')==2 || session()->get('role')==1)
    <h2 class="section-title" style="text-align:center;"><b>Tin bên ông</b></h2>
    <div class="news-list">
        @foreach($news as $ns)
        @if($ns->loai==1)
        <div class="news-item" style="text-decoration: none">
            <a href="{{route('News.chitiettin',$ns->id)}}">
                <img src="{{ asset('public/images/' . $ns->anhdaidien) }}">
                <div class="news-content">
                    <div class="news-title">{{$ns->tieude}}</div>
                    <p>Click vào để xem chi tiết</p> <!-- Nút Xem thêm -->
                </div>
            </a>
        </div>
        @endif
        @endforeach
    </div>
    @endif
    @if(session()->get('role')==3|| session()->get('role')==1)
    <h2 class="section-title" style="text-align:center;"><b>Tin bên bà</b></h2>
    <div class="news-list">
        @foreach($news as $ns)
        @if($ns->loai==2)
        <div class="news-item">
            <a href="{{route('News.chitiettin',$ns->id)}}">
                <img src="{{ asset('public/images/' . $ns->anhdaidien) }}">
                <div class="news-content">
                    <div class="news-title">{{$ns->tieude}}</div>
                    <p>Click vào để xem chi tiết</p> <!-- Nút Xem thêm -->
                </div>
            </a>
        </div>
        @endif
        @endforeach
    </div>
    @endif
</div>
<div class="intro">
    <h2><b>{{ $intro->tieude }}</b></h2>
    {!!$intro->noidung!!}
</div>
@endsection