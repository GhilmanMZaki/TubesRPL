<!doctype html>
<html lang="en">

<head>
    <title>Masuk - ClassofInformatics</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <link rel="icon" href="{{ asset('assets/images/logo.png') }}" type="image/x-icon">
    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/animate-css/vivify.min.css') }}">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/site.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animation.css') }}">

</head>

<body class="theme-cyan font-montserrat light_version">
    <!-- Page Loader -->
    @extends('layouts._loader')

    <div class="auth-main2 particles_js bg-dark">
        <div class="auth_div vivify fadeInTop">
            <div class="card shadow-xl mmauto">
                <div class="body justify-content-around">
                    <div class="login-img">
                        <img src="{{ asset('assets/images/login.jpg') }}" alt="Smart School Logo"
                            style="width: 27rem">
                    </div>
                    <form class="form-auth-small my-auto" action="{{ route('auth') }}" method="post">
                        <img src="{{ asset('assets/images/logocoi-removebg-preview.png') }}" alt="Smart School Logo"
                            class="img-fluid">
                        {{ csrf_field() }}

                        <p class="text-center" style="font-size: 12px;">Silahkan masukan username & password anda.</p>

                        <div class="form-group">
                            <label for="signin-username" class="control-label sr-only">Username</label>
                            <input type="text" class="form-control round" id="signin-username" name="username"
                                placeholder="Username" required>
                        </div>
                        <div class="form-group">
                            <label for="signin-password" class="control-label sr-only">Password</label>
                            <input type="password" class="form-control round" id="signin-password" name="password"
                                placeholder="Password" required>
                        </div>
                        <div class="form-group clearfix">
                            <label class="fancy-checkbox element-left">
                                <input type="checkbox" name="remember" class="shadow  bg-white mmauto"
                                    onclick="myFunction()">
                                <span>Show Password</span>
                            </label>
                        </div>
                        <button type="submit" class="btn bg-blue-2 text-white btn-round btn-block">MASUK</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- END WRAPPER -->

    <script src="{{ asset('assets/bundles/libscripts.bundle.js') }}"></script>
    <script src="{{ asset('assets/bundles/vendorscripts.bundle.js') }}"></script>
    <script src="{{ asset('assets/bundles/mainscripts.bundle.js') }}"></script>

    <script>
        function myFunction() {
            var x = document.getElementById("signin-password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
</body>

</html>
