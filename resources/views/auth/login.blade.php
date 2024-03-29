<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('/') }}assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="{{ asset('/') }}assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/') }}assets/libs/css/style.css">
    <link rel="stylesheet" href="{{ asset('/') }}assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <style>
    html,
    body {
        height: 100%;
    }

    body {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
    }
    </style>
</head>

<body>
    <!-- ============================================================== -->
    <!-- login page  -->
    <!-- ============================================================== -->
    <div class="splash-container">
        <div class="card ">
            <div class="card-header text-center"><a href="{{ asset('/') }}index.html"><img class="logo-img" src="{{ asset('/') }}assets/images/logo.png" alt="logo"></a><span class="splash-description">Please enter your user information.</span></div>
            <div class="card-body">

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group">
                        <input class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus id="email" type="email" placeholder="email" autocomplete="off">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>
                    <div class="form-group">
                        {{-- <input class="form-control form-control-lg" id="password" type="password" placeholder="Password"> --}}
                        <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    <div class="form-group">
                        <label class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            {{-- <input class="custom-control-input" type="checkbox"> --}}
                            <span class="custom-control-label">{{ __('Remember Me') }}</span>
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Sign in</button>
                </form>
            </div>
            <div class="card-footer bg-white p-0  ">
                <div class="card-footer-item card-footer-item-bordered">
                    {{-- <a href="#" class="footer-link">Create An Account</a></div> --}}
                <div class="card-footer-item card-footer-item-bordered">
                    @if (Route::has('password.request'))
                                    <a class="footer-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                    {{-- <a href="#" class="footer-link">Forgot Password</a> --}}
                </div>
            </div>
        </div>
    </div>
  
    <!-- ============================================================== -->
    <!-- end login page  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="{{ asset('/') }}assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="{{ asset('/') }}assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
</body>
 
</html>