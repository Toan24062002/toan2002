@extends('layouts.masterlayout')
@section('title', 'Quản lí tin tức')
@section('content')
<div class="dsach">
    <!-- <h2>Danh sách tài khoản</h2> -->
    <h3><a href="{{route('News.create')}}" class="btn btn-success"><i class="bi bi-person-plus-fill"></i> Thêm mới</a>
    </h3>

    <div class="table-wrapper">
        <table class="table-primary"> 
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Tiêu đề</th>
                    <th></th>
                    <th>Loại</th>
                    <th>Acction</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($News as $ns )
                <tr>
                    <td>{{$ns->id}}</td>
                    <td>{{$ns->tieude}}</td>
                    <td style="padding-left:250px;"><img src="{{ asset('public/images/' . $ns->anhdaidien) }}"
                            style="max-width: 200px;">
                    </td>
                    <td>
                        @if ($ns->loai == 0)
                        Tin chung
                        @elseif ($ns->loai == 1)
                        Tin bên ông
                        @else
                        Tin bên bà
                        @endif
                    </td>
                    <td><a href="{{route('News.edit',$ns->id)}}" class="btn btn-info"><i class="bi bi-pencil-fill"></i></a> <a
                            href="{{route('News.delete',$ns->id)}}" class="btn btn-danger"
                            onclick="return confirm('Bạn có chắc chắn muốn xóa?')"><i class="bi bi-calendar-x"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection