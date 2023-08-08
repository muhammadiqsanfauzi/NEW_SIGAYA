<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sicabut | Kabupaten Siak</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assetad/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('assetad/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assetad/dist/css/adminlte.min.css') }}">

    {!! ReCaptcha::htmlScriptTagJsApi() !!}

</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <style>
            div {
                opacity: 1;
                transition: opacity 300ms;
            }

            div.hide {
                opacity: 0;
            }
        </style>
        @if (Session::has('error'))
        <div id="alert" class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Opps!</strong> {{ Session::get('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="{{ url('/') }}" class="h1"><b>SICABUD</b></a><br>
                <span class="text-muted">( Sistem Informasi Cagar Budaya )</span><br>
                <span class="text-primary font-weight-bold">KABUPATEN SIAK</span>
            </div>
            <div class="card-body">
                <!-- <p class="login-box-msg">Sign in to start your session</p> -->

                <form action="{{ url('u-login') }}" method="post">
                    @csrf
                    <div class="row mt-4 mb-4">
                        <div class="input-group">
                            <input name="email" type="email" class="form-control" placeholder="Email">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        @if ($errors->has('email'))
                        <span class="text-danger text-sm font-italic">{{ $errors->first('email') }}</span>
                        @endif

                        <div class="input-group mt-3">
                            <input name="password" type="password" class="form-control" placeholder="Password">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        @if ($errors->has('password'))
                        <span class="text-danger text-sm font-italic">{{ $errors->first('password') }}</span>
                        @endif

                        <div class="input-group mt-3 d-flex justify-content-center">
                            {!! htmlFormSnippet() !!}
                            
                            @if ($errors->has('g-recaptcha-response'))
                            <span class="text-danger text-sm font-italic">{{ $errors->first('g-recaptcha-response') }}</span>
                            @endif
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-6">
                            <a href="{{ url('u-register') }}" class="btn btn-warning btn-block">Register</a>
                        </div>
                        <div class="col-6">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                    </div>
                    <div class="mt-3 justify-content-sm-center">
                        <a href="{{ url('/') }}" class="text-center mt-3"><i class="fa fa-home"></i> Beranda</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('assetad/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('assetad/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('assetad/dist/js/adminlte.min.js') }}"></script>

</html>