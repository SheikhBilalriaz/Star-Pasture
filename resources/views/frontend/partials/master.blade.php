<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets/assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets/css/style.css') }}">
    <script type="text/javascript" src="{{ asset('frontend_assets/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend_assets/js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend_assets/js/owl.carousel.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"
        integrity="sha512-yFjZbTYRCJodnuyGlsKamNE/LlEaEAxSUDe5+u61mV8zzqJVFOH7TnULE2/PP/l5vKWpUNnF4VGVkXh3MjgLsg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>

    <header id="masthead" class="site-header navbar-static-top navbar-light" role="banner">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-xl p-0">
                <div class="navbar-brand">
                    <a href="javascript:;">
                        <img src="{{ asset('frontend_assets/images/logo.png') }}" alt="Roadside Rescue">
                    </a>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-nav"
                    aria-controls="" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div id="main-nav" class="collapse navbar-collapse justify-content-end">
                    <ul id="menu-main-menu" class="navbar-nav">
                        <li class="menu-item active">
                            <a href="javascript:;" class="nav-link">Home</a>
                        </li>
                        <li class="menu-item">
                            <a href="javascript:;" class="nav-link">Browse</a>
                        </li>
                        <li class="menu-item">
                            <a href="javascript:;" class="nav-link">Postings</a>
                        </li>
                        <li class="menu-item">
                            <a href="javascript:;" class="nav-link">About Us</a>
                        </li>
                        <li class="menu-item">
                            <a href="javascript:;" class="nav-link">Reviews</a>
                        </li>
                    </ul>
                </div>
                <div class="xtra_links">
                    <!-- Check if the user is authenticated -->
                    @auth
                        <a href="javascript:;" class="btn-user btn_circle">
                            <img src="{{ asset('frontend_assets/images/user_icon.png') }}" alt="">
                            <!-- Display logged-in user's name -->
                            <span>{{ auth()->user()->name }}</span>
                        </a>
                        <a href="{{ route('logout') }}" class="btn-circle"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <img src="{{ asset('frontend_assets/images/logout_icon.png') }}" alt="Logout">
                        </a>
                        <!-- Logout form -->
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @else
                        <!-- Show login and register options if the user is not logged in -->
                        <a href="{{ route('login') }}" class="btn-head">
                            Login
                            <img src="{{ asset('frontend_assets/images/user_icon.png') }}" alt="">
                        </a>
                    @endauth

                    <a href="javascript:;" class="btn-head">Submit Ad</a>
                </div>

            </nav>
        </div>
    </header>

    @yield('content')
    <footer class="footer">
        <div class="container">
            <div class="ft_logo">
                <img src="{{ asset('frontend_assets/images/ft_logo.png') }}" alt="">
            </div>
            <div class="ft_menu">
                <ul>
                    <li>
                        <a href="javascript:;">United States</a>
                    </li>
                    <li>
                        <a href="javascript:;">Europe</a>
                    </li>
                    <li>
                        <a href="javascript:;">Asia</a>
                    </li>
                    <li>
                        <a href="javascript:;">China</a>
                    </li>
                    <li>
                        <a href="javascript:;">South America</a>
                    </li>
                    <li>
                        <a href="javascript:;">Africa</a>
                    </li>
                </ul>
            </div>
        </div>
    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#slider_listing').owlCarousel({
                loop: true,
                margin: 10,
                nav: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 3
                    },
                    1000: {
                        items: 4
                    }
                }
            })

            $('.show_more').removeClass('show_less');

            $('.info_list ul').each(function() {
                let lgt = ($(this).find('li').length);
                if (lgt > 5) {
                    $('.show_more').removeClass('show_less');
                    $(this).addClass('upgrade');
                    $(this).parent('div').append(
                        '<a href="javascript:;" class="show_more"><span class="txt">Show More</span><span class="icon"><img src="{{ asset('frontend_assets/images/show_icon.svg') }}" /></span></a>'
                    );
                }
            });

            $('.show_more').on('click', function() {
                $(this).parent('div').find('ul.upgrade').removeClass('upgrade');
                $(this).find('.txt').text('Show Less');
                $(this).addClass('show_less');
            });

            $('.show_less').on('click', function() {
                $(this).parents('.info_list').find('ul').addClass('upgrade');
                $(this).find('.txt').text('Show More');
                $(this).removeClass('show_less');
            });

        });
    </script>

</body>

</html>
