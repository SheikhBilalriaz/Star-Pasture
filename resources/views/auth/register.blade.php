<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Mofi admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Mofi admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="../assets/images/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="../assets/images/favicon.png" type="image/x-icon">
    <title>Star Pasture - Register</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link
        href="https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;300;400;500;600;700;800;900&amp;display=swap"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend_assets/css/font-awesome.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend_assets/css/vendors/icofont.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend_assets/css/vendors/themify.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend_assets/css/vendors/flag-icon.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend_assets/css/vendors/feather-icon.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend_assets/css/vendors/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend_assets/css/style.css') }}">
    <link id="color" rel="stylesheet" href="{{ asset('backend_assets/css/color-1.css') }}" media="screen">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend_assets/css/responsive.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"
        integrity="sha512-yFjZbTYRCJodnuyGlsKamNE/LlEaEAxSUDe5+u61mV8zzqJVFOH7TnULE2/PP/l5vKWpUNnF4VGVkXh3MjgLsg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://js.stripe.com/v3/"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <script src="{{ asset('frontend_assets/js/stripe_payment.js') }}"></script>
    <style>
        .d-none {
            display: none;
        }
    </style>
</head>

<body>
    <div class="container-fluid p-0">
        <div class="row m-0">
            <div class="col-12 p-0">
                <div class="login-card login-dark">
                    <div>
                        @if (session('user_registered'))
                            <div class="alert alert-success" role="alert">
                                {{ __('User registered successfully.') }}
                            </div>
                        @endif
                        <div>
                            <a class="logo" href="{{ route('front.index') }}">
                                <img class="img-fluid for-light" src="{{ asset('frontend_assets/images/logo.png') }}"
                                    alt="looginpage">
                                <img class="img-fluid for-dark" src="{{ asset('frontend_assets/images/logo.png') }}"
                                    alt="looginpage">
                            </a>
                        </div>
                        <div class="login-main">
                            <form id="register-user" class="theme-form" method="POST"
                                action="{{ route('register') }}">
                                @csrf
                                <input type="hidden" name="role" value="subscriber">
                                <input type="hidden" id="stripe_pub_key" name="stripe_pub_key"
                                    value="{{ config('services.stripe.key') }}">
                                <div>
                                    <h4>Create your account</h4>
                                    <p>Enter your personal details to create an account</p>
                                    <div class="form-group">
                                        <label for="name"
                                            class="col-md-4 col-form-label text-md-start">{{ __('Name') }}</label>
                                        <input id="name" type="text"
                                            class="form-control @error('name') is-invalid @enderror require"
                                            name="name" value="{{ old('name') }}" required autocomplete="name"
                                            autofocus>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="email"
                                            class="col-md-4 col-form-label text-md-start">{{ __('Email Address') }}</label>
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror @if ($errors->has('general')) is-invalid @endif require"
                                            name="email" value="{{ old('email') }}" required
                                            autocomplete="email">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        @if ($errors->has('general'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('general') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="password"
                                            class="col-md-4 col-form-label text-md-start">{{ __('Password') }}</label>
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror require"
                                            name="password" required autocomplete="new-password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="password-confirm"
                                            class="col-md-4 col-form-label text-md-start">{{ __('Confirm Password') }}</label>
                                        <input id="password-confirm" type="password" class="form-control require"
                                            name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                    <div class="form-group">
                                        <label for="card-element"
                                            class="col-md-4 col-form-label text-md-start">{{ __('Payment Details') }}</label>
                                        <div id="card-element"
                                            class="form-control @error('stripeToken') is-invalid @enderror @if ($errors->has('stripe')) is-invalid @endif require">
                                        </div>
                                        @error('stripeToken')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        @if ($errors->has('stripe'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('stripe') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" id="next-step"
                                            class="btn btn-primary btn-block w-100">
                                            Submit
                                        </button>
                                    </div>
                                </div>
                            </form>
                            <p class="mt-4 mb-0">Already have an account?
                                <a class="ms-2" href="{{ route('login') }}">Sign in</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="{{ asset('backend_assets/js/jquery.min.js') }}"></script>
        <script src="{{ asset('backend_assets/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('backend_assets/js/icons/feather-icon/feather.min.js') }}"></script>
        <script src="{{ asset('backend_assets/js/icons/feather-icon/feather-icon.js') }}"></script>
        <script src="{{ asset('backend_assets/js/config.js') }}"></script>
        <script src="{{ asset('backend_assets/js/script.js') }}"></script>
    </div>
</body>

</html>
