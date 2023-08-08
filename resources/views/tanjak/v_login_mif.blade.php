<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
        <meta name="description" content=""/>
        <meta name="author" content=""/>
        <title>Cabud Siak Checkin.</title>
        <link
            rel="stylesheet"
            href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script
            src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js"
            crossorigin="anonymous"></script>
    </head>
    <body class="bg-default">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    {{-- Error Alert --}}
                                    @if(session('error'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        {{session('error')}}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    @endif
                                    
                                    <div class="card-header">
                                   
                                    <h3 class="text-center font-weight-light my-9"><b>SICABUD SIAK V.1.0.0</b></h3>
                                    <div class="review text-center">
                                    <img src="soft/assets/img/phone_2.png"width="200" height="150"alt="Image"class="img-fluid rounded-circle mb-2">
                                    </div>
                                    </div>
                                    <div class="card-body">
                                        <form action="{{url('proses_login')}}" method="POST" id="logForm">
                                            {{ csrf_field() }}
                                            
                                            <div class="form-group">
                                                @error('login_gagal')
                                                    {{-- <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span> --}}
                                                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                        {{-- <span class="alert-inner--icon"><i class="ni ni-like-2"></i></span> --}}
                                                        <span class="alert-inner--text"><strong>Warning!</strong> {{ $message }}</span>
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    @enderror
                                                <label class="small mb-1" for="inputEmailAddress">Username</label>
                                                <input
                                                    class="form-control py-4"
                                                    id="inputEmailAddress"
                                                    name="username"
                                                    type="text"
                                                    placeholder="Masukkan Username"/>
                                                @if($errors->has('username'))
                                                <span class="error">{{ $errors->first('username') }}</span>
                                                @endif
                                            </div>

                                            <div class="form-group">
                                                <label class="small mb-1" for="inputPassword">Password</label>
                                                <input
                                                    class="form-control py-4"
                                                    id="inputPassword"
                                                    type="password"
                                                    name="password"
                                                    placeholder="Masukkan Password"/>
                                                @if($errors->has('password'))
                                                <span class="error">{{ $errors->first('password') }}</span>
                                                @endif
                                            </div>

                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox">
                                                    <input class="custom-control-input" id="rememberPasswordCheck" type="checkbox"/>
                                                    <label class="custom-control-label" for="rememberPasswordCheck">Remember password</label>
                                                </div>
                                            </div>

                                            <div
                                                class="form-group d-flex align-items-center justify-content-between mt-2 mb-0">
                                                {{-- <a class="small" href="#">Forgot Password?</a> --}}
                                                <button class="btn btn-primary btn-block" type="submit">Masuk</button>
                                       
                                            </div>

                                            <div class="social-auth-links text-center mb-0">
                                                <br>
                                                
                                                <a href="/" class="btn btn-block btn-info">
                                                  <i class="fa fa-reply"></i> Halaman Utama
                                                </a>
                                              
                                             </div>
                                        </form>
                                    </div>  
                                    <div class="card-footer text-center">
                                        <div class="small">
                                            Login Admin Aplikasi SICABUD !!!
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
 
        </div>
        <script
            src="https://code.jquery.com/jquery-3.4.1.min.js"
            crossorigin="anonymous"></script>
        <script
            src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"
            crossorigin="anonymous"></script>
        <script src="{{url('assets/js/scripts.js')}}"></script>
    </body>
</html>






