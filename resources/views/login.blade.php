<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>AdminLTE 3</title>

    <link rel="stylesheet" href="{{ asset('vendor/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom-login.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,600,700">

    <style>
        body {
            background: url('{{ asset('adminlte/dist/img/PERINGATAN PKK MALANG.jpg') }}') no-repeat center center fixed;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: 'Poppins', sans-serif;
        }

        .login-box {
            display: flex;
            flex-direction: row;
            width: 100%;
            max-width: 1000px;
            background: linear-gradient(135deg, #00171f, #00a8e8);
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            padding: 20px;
            color: #fff;
        }

        .login-logo {
            display: flex;
            align-items: center;
            justify-content: center;
            flex: 1;
        }

        .login-logo img {
            width: 500px;
            /* max-width: 300px; */
            height: auto;
        }

        .login-form {
            flex: 1;
        }

        .login-logo a {
            color: #fff;
            font-family: 'Poppins', sans-serif;
            font-weight: bold;
        }

        .card {
            background-color: transparent;
            border: none;
        }

        .card-header {
            background-color: transparent;
            border-bottom: none;
        }

        .btn-primary {
            background-color: #6a89cc;
            border-color: #6a89cc;
            font-family: 'Poppins', sans-serif;
        }

        .btn-primary:hover {
            background-color: #4a69bd;
            border-color: #4a69bd;
        }

        .input-group-text {
            background-color: #6a89cc;
            border-color: #6a89cc;
        }

        .input-group-text span {
            color: #fff;
        }
    </style>
</head>

<body class="login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="{{ route('login') }}">
                <img src="{{ asset('vendor/adminlte/dist/img/VENU53.svg') }}" alt="Logo">
            </a>
        </div>
        <div class="login-form">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title float-none text-center">
                        SIGN IN
                    </h3>
                </div>

                <div class="card-body login-card-body">
                    <br>
                    <form action="{{ route('proses_login') }}" method="post">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="text" name="username" class="form-control" value=""
                                placeholder="Username" autofocus>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope" style="color: black"></span>
                                </div>
                            </div>
                        </div>

                        <div class="input-group mb-3">
                            <input type="password" name="password" id="password" class="form-control"
                                placeholder="Password">
                            <div class="input-group-append">
                                <div class="input-group-text" onclick="togglePassword()">
                                    <span class="fas fa-eye" id="togglePasswordIcon" style="color: black"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-7">
                                <div class="icheck-primary"
                                    title="Keep me authenticated indefinitely or until I manually logout">
                                    <input type="checkbox" name="remember" id="remember">
                                    <label for="remember">
                                        Remember Me
                                    </label>
                                </div>
                            </div>
                            <div class="col-5">
                                <button type="submit" class="btn btn-block btn-flat btn-primary">
                                    <span class="fas fa-sign-in-alt"></span>
                                    Sign In
                                </button>
                            </div>
                        </div>
                        <br>
                        <div class="card-footer">
                            <h3 class="card-title float-none text-center" style="font-size: 10px">
                                Copyright © 2024 SIM PKK RW 05 TLOGOMAS. All rights reserved.
                            </h3>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <script src="{{ asset('vendor/adminlte/dist/js/adminlte.min.js') }}"></script>
    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const togglePasswordIcon = document.getElementById('togglePasswordIcon');
            const type = passwordInput.type === 'password' ? 'text' : 'password';
            passwordInput.type = type;
            togglePasswordIcon.classList.toggle('fa-eye-slash');
        }
    </script>
</body>

</html>
