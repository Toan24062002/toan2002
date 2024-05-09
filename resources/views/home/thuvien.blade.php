@extends('layouts.homelayout')
@section('title', 'Tin tức')
@section('content')
<div class="news-container">
    @if(session()->get('role')==2 || session()->get('role')==1)
    <h2 class="section-title" style="text-align:center;"><b>Thư viện bên ông</b></h2>
    <div class="news-list">
        @foreach($photo as $ns)
        @if($ns->loai==2)
        <div class="news-item" style="text-decoration: none">
            <!-- Đặt id cho mỗi ảnh -->
            <img src="{{ asset('public/images/' . $ns->tenanh) }}" id="img_{{ $ns->id }}" onclick="openModal('{{ asset('public/images/' . $ns->tenanh) }}', '{{ $ns->tieude }}')">
            <div class="news-content">
                <div class="news-title">{{$ns->tieude}}</div>
            </div>
            <div>Upload by id:{{$ns->id_tailen}}</div>

        </div>
        @endif
        @endforeach
    </div>
    @endif
    @if(session()->get('role')==3 || session()->get('role')==1)
    <h2 class="section-title" style="text-align:center;"><b>Thư viện bên bà</b></h2>
    <div class="news-list">
        @foreach($photo as $ns)
        @if($ns->loai==3)
        <div class="news-item" style="text-decoration: none">
            <!-- Đặt id cho mỗi ảnh -->
            <img src="{{ asset('public/images/' . $ns->tenanh) }}" id="img_{{ $ns->id }}" onclick="openModal('{{ asset('public/images/' . $ns->tenanh) }}', '{{ $ns->tieude }}')">
            <div class="news-content">
                <div class="news-title">{{$ns->tieude}}</div>
            </div>
            <div>Upload by id:{{$ns->id_tailen}}</div>
        </div>
        @endif
        @endforeach
    </div>
    @endif
</div>

<!-- Modal -->
<div id="myModal" class="modal">
    <span class="close" onclick="closeModal()"><i class="bi bi-x-circle"></i></span>
    <img class="modal-content" id="modalImg">
    <div id="caption"></div>
</div>

<!-- Script để mở và đóng modal -->
<script>
    function openModal(imgSrc, caption) {
        var modal = document.getElementById("myModal");
        var modalImg = document.getElementById("modalImg");
        var captionText = document.getElementById("caption");

        // Set đường dẫn của ảnh vào modal
        modal.style.display = "block";
        modalImg.src = imgSrc;
        captionText.innerHTML = caption;
    }

    function closeModal() {
        var modal = document.getElementById("myModal");
        modal.style.display = "none";
    }
</script>

@endsection
