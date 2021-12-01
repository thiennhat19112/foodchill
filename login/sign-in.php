<!doctype html>
<html class="no-js " lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">
    <!-- <base href="/mywebsite/foodchill/login"> -->
    <title>ĐĂNG NHẬP || FOODCHILL</title>
    <!-- Favicon-->
    <link rel="icon" href="../assets/images/fav.png" type="image/x-icon">
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
                            <img class="logo" src="../assets/images/logo.png" alt="">
                            <!-- <img class="logo" src="./logo.png" alt=""> -->
                            <h5>Đăng nhập</h5>
                        </div>
                        <div class="body">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="txtEmail" placeholder="Email">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="zmdi zmdi-account-circle"></i></span>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" name="txtPassword" placeholder="Mật khẩu">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="zmdi zmdi-lock"></i></span>
                                </div>
                            </div>
                            <div class="input-group mb-3" style="text-align: right;">
                                <a href="../resetpwd">Quên mật khẩu?</a>
                            </div>
                            <!-- <div class="checkbox">
                                <input id="remember_me" type="checkbox">
                                <label for="remember_me">Tự động đăng nhập</label>
                            </div> -->
                            <button class="btn btn-primary btn-block waves-effect waves-light" name="btnLogin">Đăng nhập</button>
                            <!-- <a href="index.html" class="btn btn-primary btn-block waves-effect waves-light" name="btnLogin">ĐĂNG
                                NHẬP</a> -->
                            <div class="signin_with mt-3">
                                <p class="mb-0">hoặc đăng nhập với</p>
                                <button class="btn btn-primary btn-icon btn-icon-mini btn-round facebook"><i class="zmdi zmdi-facebook"></i></button>
                                <button class="btn btn-primary btn-icon btn-icon-mini btn-round twitter"><i class="zmdi zmdi-twitter"></i></button>
                                <button class="btn btn-primary btn-icon btn-icon-mini btn-round google"><i class="zmdi zmdi-google-plus"></i></button>
                            </div>
                            <div class="" style="margin-top: 10px; text-align: right;">
                                <a href="../signup">Bạn chưa có tài khoản?</a>
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
                        <img src="../assets/images/signin.svg" alt="Sign In" />
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="../assets/scripts/libscripts.bundle.js"></script>
    <script src="../assets/scripts/vendorscripts.bundle.js"></script>
    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
</body>

</html>