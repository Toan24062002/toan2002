@extends('layouts.masterlayout')
@section('title', 'Slide ảnh')
@section('content')
<div class="contentt">
    <form action="{{route('photos.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <legend>Thêm thư viện ảnh</legend>
        <div class="mb-3">
            <label for="user" class="form-label">Tiêu đề</label>
            <input name="tieude" class="form-control" placeholder="Nhập tiêu đề">
        </div>
        <div class="mb-3"> 
            <label for="image">Chọn hình ảnh:</label></br>
            <input type="file" name="tenanh" class="form-control-file">
        </div>
        <div class="mb-3">
            <label for="pass" class="form-label">Chọn loại ảnh</label>
            <select id="" name="loai" class="form-control" data-size="10">
                <option value="2">Ảnh bên ông</option>
                <option value="3">Ảnh bên bà</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success" name="">Thêm</button>
    </form>
</div>
@endsection