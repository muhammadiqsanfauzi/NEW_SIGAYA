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
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{ asset('assetad/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
</head>

<body class="hold-transition register-page">
    <div class="register-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="{{ url('/') }}" class="h1"><b>SICABUD</b></a><br>
                <span class="text-muted">( Sistem Informasi Cagar Budaya )</span><br>
                <span class="text-primary font-weight-bold">KABUPATEN SIAK</span>
            </div>
            <div class="card-body">
                <!-- <form action="{{ asset('assetad/index.html') }}" method="post" id="registerForm"> -->
                <form action="javascript:void(0)" method="post" id="registerForm">
                    @csrf
                    <div class="input-group">
                        <input name="nama" type="text" class="form-control" placeholder="Nama">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <span id="nama_error" class="text-danger text-sm font-italic"></span>

                    <div class="input-group mt-3">
                        <input name="email" type="email" class="form-control" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <span id="email_error" class="text-danger text-sm font-italic"></span>
                    <br>

                    <div class="input-group mt-3">
                        <input name="user" type="text" class="form-control" placeholder="Username">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-at"></span>
                            </div>
                        </div>
                    </div>
                    <span id="user_error" class="text-danger text-sm font-italic"></span>

                    <div class="input-group mt-3">
                        <input name="password" type="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <span id="password_error" class="text-danger text-sm font-italic"></span>

                    <div class="input-group mt-3">
                        <input name="password2" type="password" class="form-control" placeholder="Retype password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <span id="password2_error" class="text-danger text-sm font-italic"></span>

                    <div class="row d-flex justify-content-center mt-3">

                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary btn-block">Register</button>
                        </div>
                    </div>
                </form>
                <div class="mt-3">
                    <a href="{{ url('/u-login') }}" class="text-center mt-3">Saya sudah register</a>
                    <br>
                    <a href="{{ url('/') }}" class="text-center mt-3">Beranda</a>
                </div>
            </div>
        </div>
    </div>
    <!-- /.register-box -->

    <script src="{{ asset('assetad/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assetad/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assetad/dist/js/adminlte.min.js') }}"></script>
    <script src="{{ asset('assetad/plugins/sweetalert2/sweetalert2.min.js') }}"></script>

    <script type="text/javascript">
        $('#registerForm').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: "{{ url('u-register')}}",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function(response) {

                    Toast.fire({
                        icon: 'success',
                        title: 'Register berhasil.'
                    })

                    setTimeout(location.replace('{{ url("u-login") }}'), 5000);
                    reset();
                },
                error: function(response) {
                    $('#nama_error').text(response.responseJSON.errors.nama);
                    $('#email_error').text(response.responseJSON.errors.email);
                    $('#user_error').text(response.responseJSON.errors.user);
                    $('#password_error').text(response.responseJSON.errors.password);
                    $('#password2_error').text(response.responseJSON.errors.password2);
                }
            });
        });

        function reset() {
            $('#registerForm').trigger("reset");
            $('#nama_error').html('');
            $('#email_error').html('');
            $('#password_error').html('');
            $('#password2_error').html('');
        }

        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 5000
        });
    </script>
</body>

</html>