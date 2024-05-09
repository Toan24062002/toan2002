<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gia phả</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('public/css/giapha.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/swiper.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/font-awesome.min.css') }}">
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="{{asset ('public/script/jquery-3.7.1.min.js')}}"></script>
    <script src="{{asset ('public/script/swiper.min.js')}}"></script>
    <script src="{{asset ('public/script/homescript.js')}}"></script>
    <script src="{{ asset('public/script/scr.js') }}"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body>
    <header class="header-container" id="header">
        <img src="{{asset('public/pic/banner1.png')}}">
    </header>
    <div class="container1">
        <ul class="navigation">
            <li><a href="{{route('home.index')}}"><b>TRANG CHỦ</b></a></li>
            <li><a href=""><b>GIỚI THIỆU</b></a></li>
            <li><a href="{{route('home.phaky')}}"><b>PHẢ KÝ</b></a></li>
            <li><a href="{{route('Home.phutho')}}"><b>PHỦ THỜ</b></a></li>
            <li><a href="{{route('Home.news')}}"><b>TIN TỨC</b></a></li>
            <li><a href="{{route('Home.thuvien')}}"><b>THƯ VIỆN</b></a></li>
            @if(session()->has('user_name'))
            <li>
                <a href="{{ route('home.logout') }}">
                    {{session()->get('user_name')}}
                    <i class="bi bi-box-arrow-right"></i>
                </a>
            </li>
            @endif
        </ul>
        <ul class="navigation-mobile">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false"><i style="font-size:30px; color:white;" class="bi bi-list"></i></a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{route('home.index')}}">TRANG CHỦ</a></li>
                    <li><a class="dropdown-item" href="{{route('home.phaky')}}">GIỚI THIỆU</a></li>
                    <li><a class="dropdown-item" href="{{route('home.phaky')}}">PHẢ KÝ</a></li>
                    <li><a class="dropdown-item" href="{{route('Home.phutho')}}">PHỦ THỜ</a></li>
                    <li><a class="dropdown-item" href="{{route('Home.news')}}">TIN TỨC</a></li>
                    <li><a class="dropdown-item" href="{{route('Home.thuvien')}}">THƯ VIỆN</a></li>
                </ul>
            </li>
            @if(session()->has('user_name'))
            <div class="ttadmin">
                    <span><i class="bi bi-person-circle"></i> {{session('user_name')}}</span>
                    <a href="{{route('home.logout')}}"><i class="bi bi-box-arrow-right"></i></a>
                </div>
                
            </div>
            @endif
        </ul>
    </div>


    <div id="overlay" class="overlay">
        <div id="modal" class="modal">
            <div class="modal-content">
                <span class="close-button" onclick="closeModal()">&times;</span>
                <h2 id="header-text"></h2>
                <div id="content-text"></div>
            </div>
        </div>
    </div>
    </script>
    @yield('content')
    <script>
    var swiper = new Swiper('.swiper-container', {
        loop: true,
        autoplay: {
            delay: 5000, // 5 giây
            disableOnInteraction: false,
        },
        navigation: {
            nextEl: '.home-banner__next',
            prevEl: '.home-banner__prev',
        },
    });
    </script>

    <footer>
        Copyright@2024 - Bản quyền thuộc Nguyễn Phước Toàn - DH21PM, khoa công nghệ thông tin Trường Đại Học An Giang.
    </footer>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const menuToggle = document.querySelector('.menu-toggle');
        const navigation = document.querySelector('.navigation');

        // Khi người dùng nhấp vào nút toggle
        menuToggle.addEventListener('click', function() {
            // Toggle class "active" để thay đổi trạng thái của menu
            navigation.classList.toggle('active');
        });
    });
    </script>
</body>

</html>