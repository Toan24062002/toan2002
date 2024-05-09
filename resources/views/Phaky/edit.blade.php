@extends('layouts.masterlayout')
@section('title', 'Quản lí phả ký')
@section('content')
@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
<div class="dsach">
    <form method="POST" action="{{route('Phaky.update', $phaky->id) }}">
        @csrf
        <legend>Chỉnh sửa thông tin</legend>
        <div class="mb-3">
            <label for="user" class="form-label">Họ tên (*)</label>
            <input name="hoten" class="form-control" value="{{$phaky->hoten}}">
        </div>
        <div class="mb-3">
            <label for="pass" class="form-label">Giới tính (*)</label>
            <select id="gioitinh" name="gioitinh" class="form-control" data-size="10">
                <option value="0">Nam</option>
                <option value="1">Nữ</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="quyen" class="form-label">Ngày sinh (*)</label>
            <input name="ngaysinh" class="form-control" value="{{$phaky->ngaysinh}}">
        </div>
        <div class="mb-3">
            <label for="quyen" class="form-label">Ngày mất</label>
            <input name="ngaymat" class="form-control" value="{{$phaky->ngaymat}}">
        </div>
        <button type="submit" class="btn btn-success" name="">Cập nhật</button>
    </form>
</div>
@endsection