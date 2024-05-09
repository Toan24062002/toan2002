@extends('layouts.masterlayout')
@section('title', 'Quản lí tài khoản xem tin')
@section('content')
@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
<div class="dsach">
<h3><a id="myBtn" href="#" class="btn btn-success"><i class="bi bi-person-plus-fill"></i> Thêm mới</a></h3>

    <table class="table-primary">
        <thead>
            <tr>
                <th>Id</th>
                <th>Tên người dùng</th>
                <th>Mật khẩu</th>
                <th>Quyền</th>
                <th>Acction</th> 
            </tr> 
        </thead>
        <tbody>
            @foreach ($accounts as $acc )
            <tr>
                <td>{{$acc->id}}</td>
                <td>{{$acc->user_name}}</td>
                <td>{{$acc->pass}}</td>
                <td>
                    @if ($acc->quyen == 1)
                    Admin
                    @elseif ($acc->quyen == 2)
                    Xem tin bên ông
                    @else
                    Xem tin bên bà
                    @endif
                </td>
                <td><a href="{{route('account.edit',$acc->id)}}" class="btn btn-info"><i
                            class="bi bi-pencil-fill"></i></a> <a href="{{route('account.delete',$acc->id)}}"
                        class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?')"><i
                            class="bi bi-calendar-x"></i></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection