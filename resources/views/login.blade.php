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

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="login-page">
    <div class="login-box" style="width: 100%; max-width: 1000px; background-color: #485499; border-radius: 10px; box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);">
        <div class="login-logo" style="color: #fff;">
            <a href="{{ route('login') }}" style="color: inherit;">
                <b>Sistem Informasi Manajemen PKK</b>
            </a>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title float-none text-center">
                            SIGN IN
                        </h3>
                    </div>
        
                    <div class="card-body login-card-body">
                        <form action="{{ route('proses_login') }}" method="post">
                            @csrf
                            <div class="input-group mb-3">
                                <input type="text" name="username" class="form-control" value="" placeholder="Username" autofocus>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-envelope"></span>
                                    </div>
                                </div>
                            </div>
        
                            <div class="input-group mb-3">
                                <input type="password" name="password" class="form-control" placeholder="Password">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>
        
                            <div class="input-group mb-3">
                                <select name="role" class="form-control">
                                    <option value="">Pilih Jenis Login</option>
                                    <option value="1">Anggota</option>
                                    <option value="2">Bendahara</option>
                                    <option value="3">Ketua</option>
                                </select>
                            </div>
        
                            <div class="row">
                                <div class="col-7">
                                    <div class="icheck-primary" title="Keep me authenticated indefinitely or until I manually logout">
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
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <img src="{{ asset('vendor/adminlte/dist/img/VENU53.svg') }}" alt="Login Image" class="img-fluid" style="width: 100%; height: auto;">
            </div>
        </div>
    </div>

    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <script src="{{ asset('vendor/adminlte/dist/js/adminlte.min.js') }}"></script>
</body>

</html>