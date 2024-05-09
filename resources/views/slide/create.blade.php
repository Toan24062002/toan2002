@extends('layouts.masterlayout')
@section('title', 'Slide ảnh')
@section('content')
@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
<div class="dsach">
    <div class="content">
        <form action="{{ route('slide.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="image">Chọn hình ảnh:</label></br>
                <input type="file" name="image" class="form-control-file">
            </div>

            <button type="submit" class="btn btn-primary">Thêm hình ảnh</button>
        </form>
    </div>
</div>
@endsection