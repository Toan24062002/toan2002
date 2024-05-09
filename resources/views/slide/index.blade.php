@extends('layouts.masterlayout')
@section('title', 'Slide ảnh')
@section('content')
@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
<div class="dsach">
    <h2><b>LIST PICTURES</b></h2>
    <h3><a href="{{route('slide.create')}}" class="btn btn-success"><i class="bi bi-person-plus-fill"></i> Thêm ảnh
            mới</a>
    </h3>

    <div class="table-wrapper">
        <table class="table-primary">
            <thead>
                <tr>
                    <th>Id</th>
                    <th style="padding-left:300px;">Hình ảnh</th>
                    <th style="padding-left:100px;">Acction</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($slideimages as $img )
                <tr>
                    <td>{{$img->id}}</td>
                    <td style="padding-left:250px;"><img src="{{ asset('public/images/' . $img->image_name) }}"
                            alt="Ảnh Slide" style="max-width: 200px;">
                    </td>
                    <td style="padding-left:100px;"><a href="" class="btn btn-info"><i
                                class="bi bi-pencil-fill"></i></a> <a href="{{route('slide.delete',$img->id)}}"
                            class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?')"><i
                                class="bi bi-calendar-x"></i></a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection