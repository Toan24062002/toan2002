@extends('layouts.masterlayout')
@section('title', 'Quản lí phả ký')
@section('content')
<div class="dsach">
    <h3><a href="{{route('account.add')}}" class="btn btn-success"><i class="bi bi-person-plus-fill"></i> Thêm mới</a>
    </h3>
    <div class="search-bar mb-3">
        <input type="text" id="searchInput" class="" placeholder="Nhập nội dung cần tìm...">
        <button type="button" id="searchButton" class="btn btn-primary"><i class="bi bi-search"></i></button>
    </div>

    <div class="table-wrapper">
        <table class="table-primary">
            <thead>
                <tr>
                    <!-- <th>Id</th> -->
                    <th>Đời thứ</th>
                    <th>Họ tên</th>
                    <th>Giới tính</th>
                    <th>Năm sinh</th>
                    <th>Thêm quan hệ</th>
                    <th>Acction</th>
                </tr>
            </thead>
            <tbody>@foreach ($phaky as $pk)
                <tr>
                    <!-- <td>{{ $pk->id }}</td> -->
                    <td>{{ $pk->doithu }}</td>
                    <td>{{ $pk->hoten }}</td>
                    <td>
                        @if ($pk->gioitinh == 0)
                        Nam
                        @elseif ($pk->gioitinh == 1)
                        Nữ
                        @endif
                    </td>
                    <td>{{ $pk->ngaysinh }}
                        @if($pk->ngaymat!="") {{- $pk->ngaymat}} @endif
                    </td>
                    <td>
                        @if($pk->gioitinh === 1 && $pk->vochong )
                        <!-- Kiểm tra nếu là nữ và đã có chồng -->
                        @if($pk->tenvochong!="" )
                        <span>{{ $pk->tenvochong }}</span></br>
                        <a href="{{ route('Phaky.addcon', $pk->id) }}" class="btn btn-success"><i
                                class="bi bi-person-plus-fill"></i> Thêm con</a>
                        @endif
                        @endif
                        @if($pk->gioitinh === 0 && !empty($pk->vochong) && empty($pk->idcha) && empty($pk->idme) &&
                        empty($pk->doithu))
                        <!-- Nếu là nam có vợ, không có idcha, idme, và doithu rỗng -->
                        <span>con rể không có chức năng thêm hôn nhân và con</span>
                        @elseif($pk->gioitinh===1 && !empty($pk->vochong))
                        <span></span>
                        @else
                        <a href="{{ route('Phaky.addvo', $pk->id) }}" class="btn btn-success"><i
                                class="bi bi-person-heart"></i> Thêm hôn nhân</a>

                        @endif
                    </td>
                    <td>
                        <a href="{{ route('Phaky.edit', $pk->id) }}" class="btn btn-info"><i
                                class="bi bi-pencil-fill"></i></a>
                        <a href="{{ route('Phaky.delete', $pk->id) }}" class="btn btn-danger"
                            onclick="return confirm('Bạn có chắc chắn muốn xóa?')"><i class="bi bi-calendar-x"></i></a>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>
<script src="{{asset ('public/script/script.js')}}"></script>
<script>
document.addEventListener("DOMContentLoaded", function() {
    searchName(); // Gọi hàm searchName() khi tài liệu HTML được tải xong
});
</script>
@endsection