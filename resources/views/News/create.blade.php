@extends('layouts.masterlayout')
@section('title', 'Quản lí tin tức')
@section('content')
@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
<div class="contentt">
    <form action="{{route('News.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <legend>Thêm tin tức</legend>
        <div class="mb-3">
            <label for="user" class="form-label">Tiêu đề</label>
            <input name="tieude" class="form-control" placeholder="Nhập tiêu đề">
        </div>
        <div class="mb-3">
            <label for="image">Chọn hình ảnh:</label></br>
            <input type="file" name="anhdaidien" class="form-control-file">
        </div>
        <div class="mb-3">
            <label for="pass" class="form-label">Chọn loại tin</label>
            <select id="" name="loai" class="form-control" data-size="10">
                <option value="0">Tin chung</option>
                <option value="1">Tin bên ông</option>
                <option value="1">Tin bên bà</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="noidung" class="form-label">Nội dung</label>
            <textarea id="editor" name="noidung" class="form-control" cols="130" rows="50"></textarea>
        </div>
        <button type="submit" class="btn btn-success" name="">Thêm</button>
    </form>
</div>
<script src="{{asset ('public/script/ckeditor5-build-classic/ckeditor.js')}}"></script>
<script>
ClassicEditor
    .create(document.querySelector('#editor'), {
        // toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
    })
    .then(editor => {
        window.editor = editor;
    })
    .catch(err => {
        console.error(err.stack);
    });
</script>
@endsection