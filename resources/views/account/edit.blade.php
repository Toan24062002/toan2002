@extends('layouts.masterlayout')
@section('title', 'Quản lí tài khoản xem tin')
@section('content')
@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
<div class="container1">
    <div class="contentt"> 
        <form method="POST" action="{{ route('account.update', $account->id)}}">
            @csrf
            <legend>Sửa tài khoản</legend>
            <div class="mb-3">
                <label for="user" class="form-label">User</label>
                <input name="user_name" class="form-control" value="{{$account->user_name}}">
            </div>
            <div class="mb-3">
                <label for="pass" class="form-label">Password</label>
                <input name="pass" class="form-control" value="{{$account->pass}}">
            </div>

            <div class="mb-3">
                <label for="quyen" class="form-label">Quyền xem</label>
                <select id="quyen" name="quyen" class="form-control" data-size="10">
                    <option value="1" @if($account->quyen == 1) selected @endif>Admin</option>
                    <option value="2" @if($account->quyen == 2) selected @endif>Xem tin bên ông</option>
                    <option value="3" @if($account->quyen == 3) selected @endif>Xem tin bên bà</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success" name="add">Cập nhật</button>
        </form>

    </div>
</div>
@endsection