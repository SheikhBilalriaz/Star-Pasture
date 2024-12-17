<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Mofi admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Mofi admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="../assets/images/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="../assets/images/favicon.png" type="image/x-icon">
    <title>Star Pasture - Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('backend_assets/css/font-awesome.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend_assets/css/vendors/icofont.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend_assets/css/vendors/themify.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend_assets/css/vendors/flag-icon.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend_assets/css/vendors/feather-icon.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend_assets/css/vendors/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend_assets/css/style.css')}}">
    <link id="color" rel="stylesheet" href="{{asset('backend_assets/css/color-1.css')}}" media="screen">
    <link rel="stylesheet" type="text/css" href="{{asset('backend_assets/css/responsive.css')}}">
</head>
<body>
<div class="loader-wrapper">
    <div class="loader loader-1">
        <div class="loader-outter"></div>
        <div class="loader-inner"></div>
        <div class="loader-inner-1"></div>
    </div>
</div>
<div class="tap-top"><i data-feather="chevrons-up"></i></div>
<div class="container-fluid p-0">
    <div class="row">
        <div class="col-12">
            <div class="login-card login-dark">
                <div>
                    <div><a class="logo" href="{{route('front.index')}}"><img class="img-fluid for-light" src="{{asset('frontend_assets/images/logo.png')}}" alt="looginpage"><img class="img-fluid for-dark" src="{{asset('frontend_assets/images/logo.png')}}" alt="looginpage"></a></div>
                    <div class="login-main">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form class="theme-form" method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <h4>Reset Your Password</h4>
                            <div class="form-group">
                                <label for="email" class="col-md-4 col-form-label text-md-start">{{ __('Email Address') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mb-0">
                                <button type="submit" class="btn btn-primary btn-block w-100" type="submit">{{ __('Send Password Reset Link') }} </button>
                            </div>
                            <p class="mt-4 mb-0 text-center">Already have an password?<a class="ms-2" href="{{route('login')}}">Sign in</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('backend_assets/js/jquery.min.js')}}"></script>
<script src="{{asset('backend_assets/js/bootstrap/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('backend_assets/js/icons/feather-icon/feather.min.js')}}"></script>
<script src="{{asset('backend_assets/js/icons/feather-icon/feather-icon.js')}}"></script>
<script src="{{asset('backend_assets/js/config.js')}}"></script>
<script src="{{asset('backend_assets/js/script.js')}}"></script>
</div>
</body>
</html>
