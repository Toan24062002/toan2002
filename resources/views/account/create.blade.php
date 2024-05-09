@extends('layouts.masterlayout')
@section('title', 'Quản lí tài khoản xem tin')
@section('content')
@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }} 
</div>
@endif
<div class="contentt">
    <form method="POST" action="{{ route('account.store')}}">
        @csrf
        <legend>Thêm tài khoản</legend>
        <div class="mb-3">
            <label for="user" class="form-label">User</label>
            <input name="user" class="form-control" placeholder="Nhập user">
        </div>
        <div class="mb-3">
            <label for="pass" class="form-label">Password</label>
            <input name="pass" class="form-control" placeholder="Nhập mật khẩu">
        </div>
        <div class="mb-3">
            <label for="quyen" class="form-label">Quyền xem</label>
            <select id="quyen" name="quyen" class="form-control" data-size="10">
                <option value="1">Admin</option>
                <option value="2">Xem tin bên ông</option>
                <option value="3">Xem tin bên bà</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success" name="">Thêm</button>
    </form>
</div>

@endsection