<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ env('APP_NAME') }}|Login</title>
    <link rel="icon" href="{{ env('APP_FAVICON') }}" type="image/x-icon">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ url('/') }}/assets/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ url('/') }}/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ url('/') }}/assets/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="{{ url('/') }}/assets/website.css">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary login_form_forentend">
            <div class="card-header text-center">
                <a href="/" class="h1  log_home"><img src="{{url('/')}}/logo.svg" alt=""/></a>
            </div>
            @if (session()->has('message'))
                <div class="alert alert-danger message">
                    {{ session()->get('message') }}
                </div>
            @endif
            <div class="card-body">
                <form method="POST" action="{{ route('adminLogin') }}">
                    @csrf
                    <div class="input-group mb-4">
                    <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        <input id="email" type="email" class="form-control  @error('email') is-invalid @enderror"
                            placeholder="Email Address" value="{{ old('email') }}" name="email">


                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="input-group mb-4">
                    <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        <input type="password" class="form-control  @error('password') is-invalid @enderror"
                            placeholder="Password" id="password" name="password">


                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                {{-- <label for="remember">
                Remember Me
              </label> --}}
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btnsign_green btn-block">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="{{ url('/') }}/assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ url('/') }}/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{ url('/') }}/assets/dist/js/adminlte.min.js"></script>
</body>

</html>
<script>
$("document").ready(function(){
    setTimeout(function(){
       $(".message").remove();
    }, 2000 ); // 5 secs

});
</script>
