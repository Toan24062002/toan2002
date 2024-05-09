<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('public/css/login.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{asset ('public/script/homescript.js')}}"></script>


</head>

<body>
    @if(session('error'))
    <div class="alert alert-success">
        {{ session('error') }}
    </div>
    @endif
    <div class="login-container">
        <main>

       
        <h3>LOGIN-USER</h3>
        <img src="{{asset ('public/icon/admin.png')}}" alt="">
        <form action="{{route('home.kiemtrauser')}}" method="POST">
            @csrf
            <label for="">Tên đăng nhập</label></br>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-circle"></i></span>
                <input name="user_name" type="text" class="form-control" placeholder="Username" aria-label="Username"
                    aria-describedby="basic-addon1">
            </div>
            <label for="">Mật khẩu</label></br>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-key"></i></span>
                <input name="pass" type="password" class="form-control" placeholder="Password"
                    aria-describedby="basic-addon1">
            </div>

            <button type="submit" class="btn btn-primary" name="">Đăng nhập</button></br>
            <a href="{{route('home.index')}}" style="margin-top:10px;" type="submit" class="btn btn-success" name="">Trở về trang chủ</a>
        </form>
        </main>
    </div>

    @if(Session::has('error'))
    <script>
    swal({
        title: "Lỗi",
        text: "Username, Password không đúng hoặc còn trống !!!",
        icon: "error",
        timer: 2000, 
        buttons: false
    });
    </script>
    @endif
    @if(Session::has('success'))
    <script>
    swal({
        title: "Thông báo",
        text: "Đăng nhập thành công",
        icon: "success",
        timer: 2000, 
        buttons: false 
    });
    </script>
    @endif
    @if(Session::has('notrole'))
    <script>
    swal({
        title: "Thông báo",
        text: "Bạn không có quyền dùng chức năng này !!!",
        icon: "error",
        timer: 2000, 
        buttons: false 
    });
    </script>
    @endif
    @if(Session::has('notlogin'))
            <script>
            swal({
                title: "Thông báo",
                text: "Bạn cần đăng nhập để sử dụng chức năng này!",
                icon: "info",
                timer: 1000, 
                buttons: false 
            });
            </script>
            @endif
</body>


</html>