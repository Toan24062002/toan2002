<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', config('app.name', '@Master Layout'))</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('public/css/admin.css') }}">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>

    <div class="container11">

        <div class="sidebar">

            <ul class="menu">
                <div class="cms"><img src="{{ asset('public/pic/1.png') }}" alt=""></div>

                <li><b><a href="">TRANG CHỦ</a></b>
                    <ul>
                        <li><a href="{{route('slide.index')}}"><i class="bi bi-images"></i> Slide ảnh</a></li>
                        <li><a href="{{route('Intro.intro')}}"><i class="bi bi-body-text"></i> Giới thiệu</a>
                        </li>
                    </ul>
                </li>
                <li><b><a href="">NGƯỜI DÙNG</a></b>
                    <ul>
                        <li><a href="{{route('account.index')}}"><i class="bi bi-person-fill-gear"></i> Tài khoản </a>
                        </li>
                    </ul>
                </li>
                <li><b><a href="">PHẢ KÍ</a></b>
                    <ul>
                        <li><a href="{{route('Phaky.index')}}"><i class="bi bi-journal-text"></i> Phả kí bên ông</a>
                        </li>
                        <li><a href="Phaky"><i class="bi bi-journal-text"></i> Phả kí bên bà</a></li>
                    </ul>
                </li>
                <li><b><a href="">TIN</a></b>
                    <ul>
                        <li><a href="{{route('News.index')}}"><i class="bi bi-newspaper"></i> Tin tức chung</a></li>
                        <li><a href=""><i class="bi bi-newspaper"></i> Tin tức bên ông</a></li>
                        <li><a href=""><i class="bi bi-newspaper"></i> Tin tức bên bà</a></li>
                    </ul>
                </li>

                <li><b><a href="">THƯ VIỆN</a></b>
                    <ul>
                        <li><a href=""><i class="bi bi-card-image"></i> Bên ông</a></li>
                        <li><a href=""><i class="bi bi-image-fill"></i> Bên bà</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <main>
            <header>
                <div class="ttadmin">
                    <span><i class="bi bi-person-circle"></i> {{session('user_name')}}</span>
                    <a href="{{route('home.logout')}}"><i class="bi bi-box-arrow-right"></i></a>
                </div>
            </header>
            <div class="contentt">
                @yield('content')
            </div>
            @if(Session::has('addsuccess'))
            <script>
            swal({
                title: "Thông báo",
                text: "Thêm người dùng thành công!",
                icon: "success",
                timer: 1000, // Thời gian tự động đóng trong miligiây (3 giây)
                buttons: false // Ẩn nút
            });
            </script>
            @endif
            @if(Session::has('addpksuccess'))
            <script>
            swal({
                title: "Thông báo",
                text: "Thêm gia phả thành công!",
                icon: "success",
                timer: 1000, // Thời gian tự động đóng trong miligiây (3 giây)
                buttons: false // Ẩn nút
            });
            </script>
            @endif
            @if(Session::has('editsuccess'))
            <script>
            swal({
                title: "Thông báo",
                text: "Cập nhật người dùng thành công!",
                icon: "success",
                timer: 1000, // Thời gian tự động đóng trong miligiây (3 giây)
                buttons: false // Ẩn nút
            });
            </script>
            @endif
            @if(Session::has('deletesuccess'))
            <script>
            swal({
                title: "Thông báo",
                text: "Xóa người dùng thành công!",
                icon: "success",
                timer: 1000, // Thời gian tự động đóng trong miligiây (3 giây)
                buttons: false // Ẩn nút
            });
            </script>
            @endif
            @if(Session::has('addimgsuccess'))
            <script>
            swal({
                title: "Thông báo",
                text: "Thêm ảnh thành công!",
                icon: "success",
                timer: 1000, // Thời gian tự động đóng trong miligiây (3 giây)
                buttons: false // Ẩn nút
            });
            </script>
            @endif
            @if(Session::has('editimgsuccess'))
            <script>
            swal({
                title: "Thông báo",
                text: "Cập nhật ảnh thành công!",
                icon: "success",
                timer: 1000, // Thời gian tự động đóng trong miligiây (3 giây)
                buttons: false // Ẩn nút 
            });
            </script>
            @endif
            @if(Session::has('deleteimgsuccess'))
            <script>
            swal({
                title: "Thông báo",
                text: "Xóa ảnh thành công!",
                icon: "success",
                timer: 1000, // Thời gian tự động đóng trong miligiây (3 giây)
                buttons: false // Ẩn nút
            });
            </script>
            @endif
            @if(Session::has('editintrosuccess'))
            <script>
            swal({
                title: "Thông báo",
                text: "Cập nhật thông tin giới thiệu thành công!",
                icon: "success",
                timer: 1000, // Thời gian tự động đóng trong miligiây (3 giây)
                buttons: false // Ẩn nút 
            });
            </script>
            @endif
            @if(Session::has('loginsuccess'))
            <script>
            swal({
                title: "Thông báo",
                text: "Đăng nhập thành công!",
                icon: "success",
                timer: 1000, // Thời gian tự động đóng trong miligiây (3 giây)
                buttons: false // Ẩn nút 
            });
            </script>
            @endif
            @if(Session::has('notlogin'))
            <script>
            swal({
                title: "Thông báo",
                text: "Đăng nhập bằng tài khoản quản trị!",
                icon: "info",
                timer: 1000, // Thời gian tự động đóng trong miligiây (3 giây)
                buttons: false // Ẩn nút 
            });
            </script>
            @endif


        </main>


    </div>

</body>

</html>