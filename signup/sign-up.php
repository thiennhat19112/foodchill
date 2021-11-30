<!doctype html>
<html class="no-js " lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">

    <title>:: FOODCHILL :: ĐĂNG KÝ</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <!-- Custom Css -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.min.css">
</head>

<body class="theme-blush">

    <div class="authentication">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-sm-12">
                    <form class="card auth_form" action="./" method="POST">
                        <div class="header">
                            <img class="logo" src="../assets/img/logo.png" alt="">
                            <!-- <img class="logo" src="./logo.png" alt=""> -->
                            <h5>Đăng ký</h5>
                            <span>Đăng ký thành viên mới</span>
                        </div>
                        <div class="body">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" required placeholder="Tên người dùng" name="username">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="zmdi zmdi-account-circle"></i></span>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="email" class="form-control" required placeholder="Email" name="email">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="zmdi zmdi-email"></i></span>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" required placeholder="Mật khẩu" name="password">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="zmdi zmdi-lock"></i></span>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" required placeholder="Nhập lại mật khẩu" name="2checkpass">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="zmdi zmdi-lock"></i></span>
                                </div>
                            </div>
                            <!-- <div class="checkbox">
                                <input id="remember_me" type="checkbox">
                                <label for="remember_me">Đồng ý với <a href="javascript:void(0);">điều khoản sử
                                        dụng</a></label>
                            </div> -->
                            <button class="btn btn-primary btn-block waves-effect waves-light" name="btnSignup">Đăng ký</button>
                            <!-- <a href="index.html" class="btn btn-primary btn-block waves-effect waves-light" name="btnSignup">ĐĂNG KÝ</a> -->
                            <div class="signin_with mt-3">
                                <a class="link" href="../login">Bạn đã có tài khoản?</a>
                            </div>
                        </div>
                    </form>
                    <!-- <div class="copyright text-center">
                    &copy;
                    <script>document.write(new Date().getFullYear())</script>,
                    <span>Designed by <a href="https://thememakker.com/" target="_blank">ThemeMakker</a></span>
                </div> -->
                </div>
                <div class="col-lg-8 col-sm-12">
                    <div class="card">
                        <img src="../assets/img/signup.svg" alt="Sign Up" />
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Jquery Core Js -->
    <script src="../assets/scripts/libscripts.bundle.js"></script>
    <script src="../assets/scripts/vendorscripts.bundle.js"></script>
</body>

</html>