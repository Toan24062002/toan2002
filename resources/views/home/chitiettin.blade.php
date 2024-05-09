@extends('layouts.homelayout')
@section('title', 'Tin tức')
@section('content')
<div class="news-container">
    <h2 class="section-title" style="text-align:center;"><b>{{$News->tieude}}</b></h2>


    <div class="news-item">
        <img src="{{ asset('public/images/' . $News->anhdaidien) }}" style="max-width:500px;display: block;
    margin: 0 auto; ">
        <div class="news-content">
            <p>{!!$News->noidung!!}</p>
        </div>
    </div>


</div>
@endsection