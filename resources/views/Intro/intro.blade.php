@extends('layouts.masterlayout')
@section('title', 'Quản lí thông tin giới thiệu')
@section('content')

    <div class="contentt">
        <h3>Thông tin giới thiệu</h3>
        <form method="POST" action="{{ route('Intro.update') }}">
            @csrf
            <div class="mb-3">
                <label for="tieude" class="form-label">Tiêu đề</label>
                <input type="text" name="tieude" class="form-control" value="{{ $intro->tieude }}">
            </div>
            <div class="mb-3">
                <label for="noidung" class="form-label">Nội dung</label>
                <textarea id="editor" name="noidung" class="form-control" cols="130"
                    rows="10">{{ $intro->noidung }}</textarea>
            </div>
            <button type="submit" class="btn btn-success">Cập nhật</button>
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