@extends('layouts.masterlayout')
@section('title', 'Quản lí phả ký')
@section('content')
@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
<div class="contentt">
    <form method="POST" action="{{route('Phaky.store',  $phaky->id) }}">
        @csrf
        <legend>Thêm quan hệ hôn nhân</legend>
        <div class="mb-3">
            <label for="user" class="form-label">Họ tên (*)</label>
            <input name="hoten" class="form-control" placeholder="Nhập họ tên">
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
            <input name="ngaysinh" class="form-control" placeholder="Nhập ngày sinh">
        </div>
        <div class="mb-3">
            <label for="pass" class="form-label">Tình trạng (*)</label>
            <select id="tinhtrang" name="tinhtrang" class="form-control" data-size="10">
                <option value="1">Còn sống</option>
                <option value="0">Đã mất</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="quyen" class="form-label">Ngày mất</label>
            <input name="ngaymat" class="form-control" placeholder="Nhập ngày mất nếu có">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Là vợ chồng của</label>
            <input type="hidden" name="vochong" class="form-control" value="{{$phaky->id}}" readonly>
            <input name="ten" class="form-control" value="{{$phaky->hoten}}" readonly>

        </div>
        <button type="submit" class="btn btn-success" name=""><i class="bi bi-person-heart"></i>Thêm</button>
    </form>
</div>

@endsection