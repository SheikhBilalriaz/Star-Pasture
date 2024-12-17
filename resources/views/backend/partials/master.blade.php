<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Mofi admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Mofi admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="{{ asset('frontend_assets/images/vector.png') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('frontend_assets/images/vector.png') }}" type="image/x-icon">
    <title>{{ $title }}</title>
    <!-- Google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend_assets/css/font-awesome.css') }}">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend_assets/css/vendors/icofont.css') }}">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend_assets/css/vendors/themify.css') }}">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend_assets/css/vendors/flag-icon.css') }}">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend_assets/css/vendors/feather-icon.css') }}">
    <!-- Plugins css start-->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend_assets/css/vendors/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend_assets/css/vendors/slick-theme.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend_assets/css/vendors/scrollbar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend_assets/css/vendors/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend_assets/css/vendors/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend_assets/css/vendors/date-range-picker/flatpickr.min.css') }}">
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend_assets/css/vendors/bootstrap.css') }}">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend_assets/css/style.css') }}">
    <link id="color" rel="stylesheet" href="{{ asset('backend_assets/css/color-1.css') }}" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend_assets/css/responsive.css') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>
<style>
    .logo-icon-wrapper a {
        color: #fff;
        font-size: 29px;
    }
</style>
<div class="loader-wrapper">
    <div class="loader loader-1">
        <div class="loader-outter"></div>
        <div class="loader-inner"></div>
        <div class="loader-inner-1"></div>
    </div>
</div>
<!-- loader ends-->
<!-- tap on top starts-->
<div class="tap-top"><i data-feather="chevrons-up"></i></div>
<!-- tap on tap ends-->
<!-- page-wrapper Start-->
<div class="page-wrapper compact-wrapper" id="pageWrapper">
    <div class="page-header row">
        <!--<div class="header-logo-wrapper col-auto">-->
        <!--  <div class="logo-wrapper">-->
        <!--      <a href="index.html">-->
        <!--          <img class="img-fluid for-light" src="{{ asset('backend_assets/images/logo/logo.png') }}" alt=""/>-->
        <!--          <img class="img-fluid for-dark" src="{{ asset('backend_assets/') }}images/logo/logo_light.png" alt=""/>-->
        <!--      </a>-->
        <!--  </div>-->
        <!--</div>-->
        <div class="col-4 col-xl-4 page-title">
            <h4 class="f-w-700">Welcome to {{ config('app.name') }}</h4>
            <nav>
                <ol class="breadcrumb justify-content-sm-start align-items-center mb-0">
                    @if (Auth::user()->role === "admin")
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"> <i data-feather="home"> </i></a></li>
                    @elseif(Auth::user()->role === "vendor")
                        <li class="breadcrumb-item"><a href="{{ route('front.index') }}"> <i data-feather="home"> </i></a></li>
                    @endif
                    <li class="breadcrumb-item f-w-400">Dashboard</li>
                    <li class="breadcrumb-item f-w-400 active">Admin</li>
                </ol>
            </nav>
        </div>
        <!-- Page Header Start-->
        <div class="header-wrapper col m-0">
            <div class="row">
                <form class="form-inline search-full col" action="#" method="get">
                    <div class="form-group w-100">
                        <div class="Typeahead Typeahead--twitterUsers">
                            <div class="u-posRelative">
                                <input class="demo-input Typeahead-input form-control-plaintext w-100" type="text" placeholder="Search Mofi .." name="q" title="" autofocus>
                                <div class="spinner-border Typeahead-spinner" role="status"><span class="sr-only">Loading...</span></div><i class="close-search" data-feather="x"></i>
                            </div>
                            <div class="Typeahead-menu"></div>
                        </div>
                    </div>
                </form>
                <div class="header-logo-wrapper col-auto p-0">
                    <div class="logo-wrapper"><a href="index.html"><img class="img-fluid" src="{{ asset('backend_assets/images/logo/logo.png') }}" alt=""></a></div>
                    <div class="toggle-sidebar">
                        <svg class="stroke-icon sidebar-toggle status_toggle middle">
                            <use href="{{ asset('backend_assets/svg/icon-sprite.svg#toggle-icon') }}"></use>
                        </svg>
                    </div>
                </div>
                <div class="nav-right col-xxl-8 col-xl-6 col-md-7 col-8 pull-right right-header p-0 ms-auto">
                    <ul class="nav-menus">
                        <li>
                            <div class="mode">
                                <svg>
                                    <use href="{{ asset('backend_assets/') }}svg/icon-sprite.svg#moon"></use>
                                </svg>
                            </div>
                        </li>
                        <li class="profile-nav onhover-dropdown px-0 py-0">
                            <div class="d-flex profile-media align-items-center"><img class="img-30" src="{{ asset('backend_assets/images/dashboard/profile.png') }}" alt="">
                                <div class="flex-grow-1"><span>{{ Auth::user()->name }}
                    </span>
                                    <p class="mb-0 font-outfit">UI Designer<i class="fa fa-angle-down"></i></p>
                                </div>
                            </div>
                            <ul class="profile-dropdown onhover-show-div">

                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                                        <i data-feather="log-in"> </i>
                                        <span>{{ __('Logout') }}</span>
                                    </a>
                                </li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>

                            </ul>
                        </li>
                    </ul>
                </div>
                <script class="result-template" type="text/x-handlebars-template">
                    <div class="ProfileCard u-cf">
                        <div class="ProfileCard-avatar"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-airplay m-0"><path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path><polygon points="12 15 17 21 7 21 12 15"></polygon></svg></div>
                        <div class="ProfileCard-details">
                            <div class="ProfileCard-realName"></div>
                        </div>
                    </div>
                </script>
                <script class="empty-template" type="text/x-handlebars-template"><div class="EmptyMessage">Your search turned up 0 results. This most likely means the backend is down, yikes!</div></script>
            </div>
        </div>
        <!-- Page Header Ends                              -->
    </div>
    <!-- Page Body Start-->
    <div class="page-body-wrapper">
        <!-- Page Sidebar Start-->
        <div class="sidebar-wrapper" data-layout="stroke-svg">
            <div>
                <div class="logo-wrapper"><a href="index.html"><img class="img-fluid" src="../assets/images/logo/logo_light.png" alt=""></a>
                    <div class="back-btn"><i class="fa fa-angle-left"></i></div>
                    <div class="toggle-sidebar" checked="checked">
                        <svg class="stroke-icon sidebar-toggle status_toggle middle">
                            <use href="../assets/svg/icon-sprite.svg#toggle-icon"></use>
                        </svg>
                        <svg class="fill-icon sidebar-toggle status_toggle middle">
                            <use href="../assets/svg/icon-sprite.svg#fill-toggle-icon"></use>
                        </svg>
                    </div>
                </div>
                <div class="logo-icon-wrapper"><a href="index.html"><img class="img-fluid" src="../assets/images/logo/logo-icon.png" alt=""></a></div>
                <nav class="sidebar-main">
                    <div class="left-arrow disabled" id="left-arrow"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg></div>
                    <div id="sidebar-menu">
                        <ul class="sidebar-links" id="simple-bar" data-simplebar="init" style="display: block;"><div class="simplebar-wrapper" style="margin: 0px;"><div class="simplebar-height-auto-observer-wrapper"><div class="simplebar-height-auto-observer"></div></div><div class="simplebar-mask"><div class="simplebar-offset" style="right: 0px; bottom: 0px;"><div class="simplebar-content-wrapper" style="height: 100%; overflow: hidden scroll;"><div class="simplebar-content" style="padding: 0px;">
                                                <li class="back-btn"><a href="index.html"><img class="img-fluid" src="../assets/images/logo/logo-icon.png" alt=""></a>
                                                    <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
                                                </li>
                                                <li class="pin-title sidebar-main-title">
                                                    <div>
                                                        <h6>Pinned</h6>
                                                    </div>
                                                </li>
                                                <li class="sidebar-main-title">
                                                    <div>
                                                        <h6 class="lan-1">General</h6>
                                                    </div>
                                                </li>
                                                <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title" href="javascript:void(0)">
                                                        <svg class="stroke-icon">
                                                            <use href="../assets/svg/icon-sprite.svg#stroke-home"></use>
                                                        </svg>
                                                        <svg class="fill-icon">
                                                            <use href="../assets/svg/icon-sprite.svg#fill-home"></use>
                                                        </svg><span class="lan-3">Dashboards</span><div class="according-menu"><i class="fa fa-angle-right"></i></div></a>
                                                    <ul class="sidebar-submenu" style="display: none;">
                                                        <li><a class="lan-4" href="index.html">Default</a></li>
                                                        <li><a class="lan-5" href="dashboard-02.html">Project</a></li>
                                                        <li><a href="dashboard-03.html">Ecommerce</a></li>
                                                        <li><a href="dashboard-04.html">Education</a></li>
                                                    </ul>
                                                </li>
                                                <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title active" href="javascript:void(0)">
                                                        <svg class="stroke-icon">
                                                            <use href="../assets/svg/icon-sprite.svg#stroke-widget"></use>
                                                        </svg>
                                                        <svg class="fill-icon">
                                                            <use href="../assets/svg/icon-sprite.svg#fill-widget"></use>
                                                        </svg><span class="lan-6">Widgets</span><div class="according-menu"><i class="fa fa-angle-down"></i></div></a>
                                                    <ul class="sidebar-submenu" style="display: block;">
                                                        <li><a href="general-widget.html">General</a></li>
                                                        <li><a href="chart-widget.html" class="active">Chart</a></li>
                                                    </ul>
                                                </li>
                                                <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title" href="javascript:void(0)">
                                                        <svg class="stroke-icon">
                                                            <use href="../assets/svg/icon-sprite.svg#stroke-layout"></use>
                                                        </svg>
                                                        <svg class="fill-icon">
                                                            <use href="../assets/svg/icon-sprite.svg#fill-layout"></use>
                                                        </svg><span class="lan-7">Page layout</span><div class="according-menu"><i class="fa fa-angle-right"></i></div></a>
                                                    <ul class="sidebar-submenu" style="display: none;">
                                                        <li><a href="box-layout.html">Boxed</a></li>
                                                        <li><a href="layout-rtl.html">RTL</a></li>
                                                        <li><a href="layout-dark.html">Dark Layout</a></li>
                                                        <li><a href="hide-on-scroll.html">Hide Nav Scroll</a></li>
                                                    </ul>
                                                </li>
                                                <li class="sidebar-main-title">
                                                    <div>
                                                        <h6 class="lan-8">Applications</h6>
                                                    </div>
                                                </li>
                                                <li class="sidebar-list"><i class="fa fa-thumb-tack">    </i><a class="sidebar-link sidebar-title" href="javascript:void(0)">
                                                        <svg class="stroke-icon">
                                                            <use href="../assets/svg/icon-sprite.svg#stroke-project"></use>
                                                        </svg>
                                                        <svg class="fill-icon">
                                                            <use href="../assets/svg/icon-sprite.svg#fill-project"></use>
                                                        </svg><span>Project           </span><div class="according-menu"><i class="fa fa-angle-right"></i></div></a>
                                                    <ul class="sidebar-submenu" style="display: none;">
                                                        <li><a href="projects.html">Project List</a></li>
                                                        <li><a href="projectcreate.html">Create new</a></li>
                                                    </ul>
                                                </li>
                                                <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title link-nav" href="file-manager.html">
                                                        <svg class="stroke-icon">
                                                            <use href="../assets/svg/icon-sprite.svg#stroke-file"></use>
                                                        </svg>
                                                        <svg class="fill-icon">
                                                            <use href="../assets/svg/icon-sprite.svg#fill-file"></use>
                                                        </svg><span>File manager</span><div class="according-menu"><i class="fa fa-angle-right"></i></div></a></li>
                                                <li class="sidebar-list"><i class="fa fa-thumb-tack">        </i><a class="sidebar-link sidebar-title link-nav" href="kanban.html">
                                                        <svg class="stroke-icon">
                                                            <use href="../assets/svg/icon-sprite.svg#stroke-board"></use>
                                                        </svg>
                                                        <svg class="fill-icon">
                                                            <use href="../assets/svg/icon-sprite.svg#fill-board"></use>
                                                        </svg><span>kanban Board</span><div class="according-menu"><i class="fa fa-angle-right"></i></div></a></li>
                                                <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title" href="javascript:void(0)">
                                                        <svg class="stroke-icon">
                                                            <use href="../assets/svg/icon-sprite.svg#stroke-ecommerce"></use>
                                                        </svg>
                                                        <svg class="fill-icon">
                                                            <use href="../assets/svg/icon-sprite.svg#fill-ecommerce"></use>
                                                        </svg><span>Ecommerce</span><div class="according-menu"><i class="fa fa-angle-right"></i></div></a>
                                                    <ul class="sidebar-submenu" style="display: none;">
                                                        <li><a href="add-product.html">Add Product</a></li>
                                                        <li><a href="product.html">Product</a></li>
                                                        <li><a href="product-page.html">Product page</a></li>
                                                        <li><a href="list-products.html">Product list</a></li>
                                                        <li><a href="payment-details.html">Payment Details</a></li>
                                                        <li><a href="order-history.html">Order History</a></li>
                                                        <li><a class="submenu-title" href="javascript:void(0)">Invoices<span class="sub-arrow"><i class="fa fa-angle-right"></i></span><div class="according-menu"><i class="fa fa-angle-right"></i></div></a>
                                                            <ul class="nav-sub-childmenu submenu-content" style="display: none;">
                                                                <li><a href="invoice-1.html">Invoice-1</a></li>
                                                                <li><a href="invoice-2.html">Invoice-2</a></li>
                                                                <li><a href="invoice-3.html">Invoice-3</a></li>
                                                                <li><a href="invoice-4.html">Invoice-4</a></li>
                                                                <li> <a href="invoice-5.html">Invoice-5</a></li>
                                                                <li><a href="invoice-template.html">Invoice-6</a></li>
                                                            </ul>
                                                        </li>
                                                        <li><a href="cart.html">Cart</a></li>
                                                        <li><a href="list-wish.html">Wishlist</a></li>
                                                        <li><a href="checkout.html">Checkout</a></li>
                                                        <li><a href="pricing.html">Pricing          </a></li>
                                                    </ul>
                                                </li>
                                                <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title link-nav" href="letter-box.html">
                                                        <svg class="stroke-icon">
                                                            <use href="../assets/svg/icon-sprite.svg#stroke-email"></use>
                                                        </svg>
                                                        <svg class="fill-icon">
                                                            <use href="../assets/svg/icon-sprite.svg#fill-email"> </use>
                                                        </svg><span>Letter Box</span><div class="according-menu"><i class="fa fa-angle-right"></i></div></a></li>
                                                <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title" href="javascript:void(0)">
                                                        <svg class="stroke-icon">
                                                            <use href="../assets/svg/icon-sprite.svg#stroke-chat"></use>
                                                        </svg>
                                                        <svg class="fill-icon">
                                                            <use href="../assets/svg/icon-sprite.svg#fill-chat"></use>
                                                        </svg><span>Chat</span><div class="according-menu"><i class="fa fa-angle-right"></i></div></a>
                                                    <ul class="sidebar-submenu" style="display: none;">
                                                        <li><a href="private-chat.html">Private Chat</a></li>
                                                        <li><a href="group-chat.html">Group Chat</a></li>
                                                    </ul>
                                                </li>
                                                <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title" href="javascript:void(0)">
                                                        <svg class="stroke-icon">
                                                            <use href="../assets/svg/icon-sprite.svg#stroke-user"></use>
                                                        </svg>
                                                        <svg class="fill-icon">
                                                            <use href="../assets/svg/icon-sprite.svg#fill-user"></use>
                                                        </svg><span>Users</span><div class="according-menu"><i class="fa fa-angle-right"></i></div></a>
                                                    <ul class="sidebar-submenu" style="display: none;">
                                                        <li><a href="user-profile.html">Users Profile</a></li>
                                                        <li><a href="edit-profile.html">Users Edit</a></li>
                                                        <li><a href="user-cards.html">Users Cards</a></li>
                                                    </ul>
                                                </li>
                                                <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title link-nav" href="bookmark.html">
                                                        <svg class="stroke-icon">
                                                            <use href="../assets/svg/icon-sprite.svg#stroke-bookmark"></use>
                                                        </svg>
                                                        <svg class="fill-icon">
                                                            <use href="../assets/svg/icon-sprite.svg#fill-bookmark"> </use>
                                                        </svg><span>Bookmarks</span><div class="according-menu"><i class="fa fa-angle-right"></i></div></a></li>
                                                <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title link-nav" href="contacts.html">
                                                        <svg class="stroke-icon">
                                                            <use href="../assets/svg/icon-sprite.svg#stroke-contact"></use>
                                                        </svg>
                                                        <svg class="fill-icon">
                                                            <use href="../assets/svg/icon-sprite.svg#fill-contact"> </use>
                                                        </svg><span>Contacts</span><div class="according-menu"><i class="fa fa-angle-right"></i></div></a></li>
                                                <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title link-nav" href="task.html">
                                                        <svg class="stroke-icon">
                                                            <use href="../assets/svg/icon-sprite.svg#stroke-task"></use>
                                                        </svg>
                                                        <svg class="fill-icon">
                                                            <use href="../assets/svg/icon-sprite.svg#fill-task"> </use>
                                                        </svg><span>Tasks</span><div class="according-menu"><i class="fa fa-angle-right"></i></div></a></li>
                                                <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title link-nav" href="calendar-basic.html">
                                                        <svg class="stroke-icon">
                                                            <use href="../assets/svg/icon-sprite.svg#stroke-calendar"></use>
                                                        </svg>
                                                        <svg class="fill-icon">
                                                            <use href="../assets/svg/icon-sprite.svg#fill-calender"></use>
                                                        </svg><span>Calendar</span><div class="according-menu"><i class="fa fa-angle-right"></i></div></a></li>
                                                <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title link-nav" href="social-app.html">
                                                        <svg class="stroke-icon">
                                                            <use href="../assets/svg/icon-sprite.svg#stroke-social"></use>
                                                        </svg>
                                                        <svg class="fill-icon">
                                                            <use href="../assets/svg/icon-sprite.svg#fill-social"> </use>
                                                        </svg><span>Social App</span><div class="according-menu"><i class="fa fa-angle-right"></i></div></a></li>
                                                <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title link-nav" href="to-do.html">
                                                        <svg class="stroke-icon">
                                                            <use href="../assets/svg/icon-sprite.svg#stroke-to-do"></use>
                                                        </svg>
                                                        <svg class="fill-icon">
                                                            <use href="../assets/svg/icon-sprite.svg#fill-to-do"> </use>
                                                        </svg><span>To-Do</span><div class="according-menu"><i class="fa fa-angle-right"></i></div></a></li>
                                                <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title link-nav" href="search.html">
                                                        <svg class="stroke-icon">
                                                            <use href="../assets/svg/icon-sprite.svg#stroke-search"></use>
                                                        </svg>
                                                        <svg class="fill-icon">
                                                            <use href="../assets/svg/icon-sprite.svg#fill-search"> </use>
                                                        </svg><span>Search Result</span><div class="according-menu"><i class="fa fa-angle-right"></i></div></a></li>
                                                <li class="sidebar-main-title">
                                                    <div>
                                                        <h6>Forms &amp; Table</h6>
                                                    </div>
                                                </li>
                                                <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title" href="javascript:void(0)">
                                                        <svg class="stroke-icon">
                                                            <use href="../assets/svg/icon-sprite.svg#stroke-form"></use>
                                                        </svg>
                                                        <svg class="fill-icon">
                                                            <use href="../assets/svg/icon-sprite.svg#fill-form"> </use>
                                                        </svg><span>Forms</span><div class="according-menu"><i class="fa fa-angle-right"></i></div></a>
                                                    <ul class="sidebar-submenu" style="display: none;">
                                                        <li><a class="submenu-title" href="javascript:void(0)">Form Controls<span class="sub-arrow"><i class="fa fa-angle-right"></i></span><div class="according-menu"><i class="fa fa-angle-right"></i></div></a>
                                                            <ul class="nav-sub-childmenu submenu-content" style="display: none;">
                                                                <li><a href="form-validation.html">Form Validation</a></li>
                                                                <li><a href="base-input.html">Base Inputs</a></li>
                                                                <li><a href="radio-checkbox-control.html">Checkbox &amp; Radio</a></li>
                                                                <li><a href="input-group.html">Input Groups</a></li>
                                                                <li> <a href="input-mask.html">Input Mask</a></li>
                                                                <li><a href="megaoptions.html">Mega Options</a></li>
                                                            </ul>
                                                        </li>
                                                        <li><a class="submenu-title" href="javascript:void(0)">Form Widgets<span class="sub-arrow"><i class="fa fa-angle-right"></i></span><div class="according-menu"><i class="fa fa-angle-right"></i></div></a>
                                                            <ul class="nav-sub-childmenu submenu-content" style="display: none;">
                                                                <li><a href="datepicker.html">Datepicker</a></li>
                                                                <li><a href="touchspin.html">Touchspin</a></li>
                                                                <li><a href="select2.html">Select2</a></li>
                                                                <li><a href="switch.html">Switch</a></li>
                                                                <li><a href="typeahead.html">Typeahead</a></li>
                                                                <li><a href="clipboard.html">Clipboard</a></li>
                                                            </ul>
                                                        </li>
                                                        <li><a class="submenu-title" href="javascript:void(0)">Form layout<span class="sub-arrow"><i class="fa fa-angle-right"></i></span><div class="according-menu"><i class="fa fa-angle-right"></i></div></a>
                                                            <ul class="nav-sub-childmenu submenu-content" style="display: none;">
                                                                <li><a href="form-wizard.html">Form Wizard 1</a></li>
                                                                <li><a href="form-wizard-two.html">Form Wizard 2</a></li>
                                                                <li><a href="two-factor.html">Two Factor</a></li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title" href="javascript:void(0)">
                                                        <svg class="stroke-icon">
                                                            <use href="../assets/svg/icon-sprite.svg#stroke-table"></use>
                                                        </svg>
                                                        <svg class="fill-icon">
                                                            <use href="../assets/svg/icon-sprite.svg#fill-table"></use>
                                                        </svg><span>Tables</span><div class="according-menu"><i class="fa fa-angle-right"></i></div></a>
                                                    <ul class="sidebar-submenu" style="display: none;">
                                                        <li><a class="submenu-title" href="javascript:void(0)">Bootstrap Tables<span class="sub-arrow"><i class="fa fa-angle-right"></i></span><div class="according-menu"><i class="fa fa-angle-right"></i></div></a>
                                                            <ul class="nav-sub-childmenu submenu-content" style="display: none;">
                                                                <li><a href="bootstrap-basic-table.html">Basic Tables</a></li>
                                                                <li><a href="table-components.html">Table components</a></li>
                                                            </ul>
                                                        </li>
                                                        <li><a class="submenu-title" href="javascript:void(0)">Data Tables<span class="sub-arrow"><i class="fa fa-angle-right"></i></span><div class="according-menu"><i class="fa fa-angle-right"></i></div></a>
                                                            <ul class="nav-sub-childmenu submenu-content" style="display: none;">
                                                                <li><a href="datatable-basic-init.html">Basic Init</a></li>
                                                                <li> <a href="datatable-advance.html">Advance Init </a></li>
                                                                <li><a href="datatable-API.html">API</a></li>
                                                                <li><a href="datatable-data-source.html">Data Sources</a></li>
                                                            </ul>
                                                        </li>
                                                        <li><a href="datatable-ext-autofill.html">Ex. Data Tables</a></li>
                                                        <li><a href="jsgrid-table.html">Js Grid Table        </a></li>
                                                    </ul>
                                                </li>
                                                <li class="sidebar-main-title">
                                                    <div>
                                                        <h6>Components</h6>
                                                    </div>
                                                </li>
                                                <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title" href="javascript:void(0)">
                                                        <svg class="stroke-icon">
                                                            <use href="../assets/svg/icon-sprite.svg#stroke-ui-kits"></use>
                                                        </svg>
                                                        <svg class="fill-icon">
                                                            <use href="../assets/svg/icon-sprite.svg#fill-ui-kits"></use>
                                                        </svg><span>Ui Kits</span><div class="according-menu"><i class="fa fa-angle-right"></i></div></a>
                                                    <ul class="sidebar-submenu" style="display: none;">
                                                        <li><a href="typography.html">Typography</a></li>
                                                        <li><a href="avatars.html">Avatars</a></li>
                                                        <li><a href="helper-classes.html">helper classes</a></li>
                                                        <li><a href="grid.html">Grid</a></li>
                                                        <li><a href="tag-pills.html">Tag &amp; pills</a></li>
                                                        <li><a href="progress-bar.html">Progress</a></li>
                                                        <li><a href="modal.html">Modal</a></li>
                                                        <li><a href="alert.html">Alert</a></li>
                                                        <li><a href="popover.html">Popover</a></li>
                                                        <li><a href="tooltip.html">Tooltip</a></li>
                                                        <li><a href="dropdown.html">Dropdown</a></li>
                                                        <li><a href="according.html">Accordion</a></li>
                                                        <li><a href="tab-bootstrap.html">Tabs</a></li>
                                                        <li><a href="list.html">Lists</a></li>
                                                    </ul>
                                                </li>
                                                <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title" href="javascript:void(0)">
                                                        <svg class="stroke-icon">
                                                            <use href="../assets/svg/icon-sprite.svg#stroke-bonus-kit"></use>
                                                        </svg>
                                                        <svg class="fill-icon">
                                                            <use href="../assets/svg/icon-sprite.svg#fill-bonus-kit"></use>
                                                        </svg><span>Bonus Ui</span><div class="according-menu"><i class="fa fa-angle-right"></i></div></a>
                                                    <ul class="sidebar-submenu" style="display: none;">
                                                        <li><a href="scrollable.html">Scrollable</a></li>
                                                        <li><a href="tree.html">Tree view</a></li>
                                                        <li><a href="toasts.html">Toasts</a></li>
                                                        <li><a href="rating.html">Rating</a></li>
                                                        <li><a href="dropzone.html">dropzone</a></li>
                                                        <li><a href="tour.html">Tour</a></li>
                                                        <li><a href="sweet-alert2.html">SweetAlert2</a></li>
                                                        <li><a href="modal-animated.html">Animated Modal</a></li>
                                                        <li><a href="owl-carousel.html">Owl Carousel</a></li>
                                                        <li><a href="ribbons.html">Ribbons</a></li>
                                                        <li><a href="pagination.html">Pagination</a></li>
                                                        <li><a href="breadcrumb.html">Breadcrumb</a></li>
                                                        <li><a href="range-slider.html">Range Slider</a></li>
                                                        <li><a href="image-cropper.html">Image cropper</a></li>
                                                        <li><a href="basic-card.html">Basic Card</a></li>
                                                        <li><a href="creative-card.html">Creative Card</a></li>
                                                        <li><a href="dragable-card.html">Draggable Card</a></li>
                                                        <li><a href="timeline-v-1.html">Timeline </a></li>
                                                    </ul>
                                                </li>
                                                <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title" href="javascript:void(0)">
                                                        <svg class="stroke-icon">
                                                            <use href="../assets/svg/icon-sprite.svg#stroke-animation"></use>
                                                        </svg>
                                                        <svg class="fill-icon">
                                                            <use href="../assets/svg/icon-sprite.svg#fill-animation"></use>
                                                        </svg><span>Animation</span><div class="according-menu"><i class="fa fa-angle-right"></i></div></a>
                                                    <ul class="sidebar-submenu" style="display: none;">
                                                        <li><a href="animate.html">Animate</a></li>
                                                        <li><a href="scroll-reval.html">Scroll Reveal</a></li>
                                                        <li><a href="AOS.html">AOS animation</a></li>
                                                        <li><a href="tilt.html">Tilt Animation</a></li>
                                                        <li><a href="wow.html">Wow Animation</a></li>
                                                    </ul>
                                                </li>
                                                <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title" href="javascript:void(0)">
                                                        <svg class="stroke-icon">
                                                            <use href="../assets/svg/icon-sprite.svg#stroke-icons"></use>
                                                        </svg>
                                                        <svg class="fill-icon">
                                                            <use href="../assets/svg/icon-sprite.svg#fill-icons"></use>
                                                        </svg><span>Icons</span><div class="according-menu"><i class="fa fa-angle-right"></i></div></a>
                                                    <ul class="sidebar-submenu" style="display: none;">
                                                        <li><a href="flag-icon.html">Flag icon</a></li>
                                                        <li><a href="font-awesome.html">Fontawesome Icon</a></li>
                                                        <li><a href="ico-icon.html">Ico Icon</a></li>
                                                        <li><a href="themify-icon.html">Themify Icon</a></li>
                                                        <li><a href="feather-icon.html">Feather icon</a></li>
                                                        <li><a href="whether-icon.html">Whether Icon</a></li>
                                                    </ul>
                                                </li>
                                                <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title" href="javascript:void(0)">
                                                        <svg class="stroke-icon">
                                                            <use href="../assets/svg/icon-sprite.svg#stroke-button"></use>
                                                        </svg>
                                                        <svg class="fill-icon">
                                                            <use href="../assets/svg/icon-sprite.svg#fill-button"></use>
                                                        </svg><span>Buttons</span><div class="according-menu"><i class="fa fa-angle-right"></i></div></a>
                                                    <ul class="sidebar-submenu" style="display: none;">
                                                        <li><a href="buttons.html">Default Style</a></li>
                                                        <li><a href="buttons-flat.html">Flat Style</a></li>
                                                        <li><a href="buttons-edge.html">Edge Style</a></li>
                                                        <li><a href="raised-button.html">Raised Style</a></li>
                                                        <li><a href="button-group.html">Button Group</a></li>
                                                    </ul>
                                                </li>
                                                <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title" href="javascript:void(0)">
                                                        <svg class="stroke-icon">
                                                            <use href="../assets/svg/icon-sprite.svg#stroke-charts"></use>
                                                        </svg>
                                                        <svg class="fill-icon">
                                                            <use href="../assets/svg/icon-sprite.svg#fill-charts"></use>
                                                        </svg><span>Charts</span><div class="according-menu"><i class="fa fa-angle-right"></i></div></a>
                                                    <ul class="sidebar-submenu" style="display: none;">
                                                        <li><a href="echarts.html">Echarts</a></li>
                                                        <li><a href="chart-apex.html">Apex Chart</a></li>
                                                        <li><a href="chart-google.html">Google Chart</a></li>
                                                        <li><a href="chart-sparkline.html">Sparkline chart</a></li>
                                                        <li><a href="chart-flot.html">Flot Chart</a></li>
                                                        <li><a href="chart-knob.html">Knob Chart</a></li>
                                                        <li><a href="chart-morris.html">Morris Chart</a></li>
                                                        <li><a href="chartjs.html">Chatjs Chart</a></li>
                                                        <li><a href="chartist.html">Chartist Chart</a></li>
                                                        <li><a href="chart-peity.html">Peity Chart</a></li>
                                                    </ul>
                                                </li>
                                                <li class="sidebar-main-title">
                                                    <div>
                                                        <h6>Pages</h6>
                                                    </div>
                                                </li>
                                                <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title link-nav" href="landing-page.html">
                                                        <svg class="stroke-icon">
                                                            <use href="../assets/svg/icon-sprite.svg#stroke-landing-page"></use>
                                                        </svg>
                                                        <svg class="fill-icon">
                                                            <use href="../assets/svg/icon-sprite.svg#fill-landing-page"></use>
                                                        </svg><span>Landing page</span><div class="according-menu"><i class="fa fa-angle-right"></i></div></a></li>
                                                <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title link-nav" href="sample-page.html">
                                                        <svg class="stroke-icon">
                                                            <use href="../assets/svg/icon-sprite.svg#stroke-sample-page"></use>
                                                        </svg>
                                                        <svg class="fill-icon">
                                                            <use href="../assets/svg/icon-sprite.svg#fill-sample-page"></use>
                                                        </svg><span>Sample page</span><div class="according-menu"><i class="fa fa-angle-right"></i></div></a></li>
                                                <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title link-nav" href="internationalization.html">
                                                        <svg class="stroke-icon">
                                                            <use href="../assets/svg/icon-sprite.svg#stroke-internationalization"></use>
                                                        </svg>
                                                        <svg class="fill-icon">
                                                            <use href="../assets/svg/icon-sprite.svg#fill-internationalization"></use>
                                                        </svg><span>Internationalization</span><div class="according-menu"><i class="fa fa-angle-right"></i></div></a></li>
                                                <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title link-nav" href="../starter-kit/index.html" target="_blank">
                                                        <svg class="stroke-icon">
                                                            <use href="../assets/svg/icon-sprite.svg#stroke-starter-kit"></use>
                                                        </svg>
                                                        <svg class="fill-icon">
                                                            <use href="../assets/svg/icon-sprite.svg#fill-starter-kit"></use>
                                                        </svg><span>Starter kit</span><div class="according-menu"><i class="fa fa-angle-right"></i></div></a></li>
                                                <li class="mega-menu sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title" href="javascript:void(0)">
                                                        <svg class="stroke-icon">
                                                            <use href="../assets/svg/icon-sprite.svg#stroke-others"></use>
                                                        </svg>
                                                        <svg class="fill-icon">
                                                            <use href="../assets/svg/icon-sprite.svg#fill-others"></use>
                                                        </svg><span>Others</span><div class="according-menu"><i class="fa fa-angle-right"></i></div></a>
                                                    <div class="mega-menu-container menu-content" style="display: none;">
                                                        <div class="container-fluid">
                                                            <div class="row">
                                                                <div class="col mega-box">
                                                                    <div class="link-section">
                                                                        <div class="submenu-title">
                                                                            <h5>Error Page</h5>
                                                                            <div class="according-menu"><i class="fa fa-angle-right"></i></div></div>
                                                                        <ul class="submenu-content opensubmegamenu" style="display: none;">
                                                                            <li><a href="error-400.html">Error 400</a></li>
                                                                            <li><a href="error-401.html">Error 401</a></li>
                                                                            <li><a href="error-403.html">Error 403</a></li>
                                                                            <li><a href="error-404.html">Error 404</a></li>
                                                                            <li><a href="error-500.html">Error 500</a></li>
                                                                            <li><a href="error-503.html">Error 503</a></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                                <div class="col mega-box">
                                                                    <div class="link-section">
                                                                        <div class="submenu-title">
                                                                            <h5> Authentication</h5>
                                                                            <div class="according-menu"><i class="fa fa-angle-right"></i></div></div>
                                                                        <ul class="submenu-content opensubmegamenu" style="display: none;">
                                                                            <li><a href="login.html" target="_blank">Login Simple</a></li>
                                                                            <li><a href="login_one.html" target="_blank">Login with bg image</a></li>
                                                                            <li><a href="login_two.html" target="_blank">Login with image two                      </a></li>
                                                                            <li><a href="login-bs-validation.html" target="_blank">Login With validation</a></li>
                                                                            <li><a href="login-bs-tt-validation.html" target="_blank">Login with tooltip</a></li>
                                                                            <li><a href="login-sa-validation.html" target="_blank">Login with sweetalert</a></li>
                                                                            <li><a href="sign-up.html" target="_blank">Register Simple</a></li>
                                                                            <li><a href="sign-up-one.html" target="_blank">Register with Bg Image                              </a></li>
                                                                            <li><a href="sign-up-two.html" target="_blank">Register with image two</a></li>
                                                                            <li><a href="sign-up-wizard.html" target="_blank">Register wizard</a></li>
                                                                            <li><a href="unlock.html">Unlock User</a></li>
                                                                            <li><a href="forget-password.html">Forget Password</a></li>
                                                                            <li><a href="reset-password.html">Reset Password</a></li>
                                                                            <li><a href="maintenance.html">Maintenance</a></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                                <div class="col mega-box">
                                                                    <div class="link-section">
                                                                        <div class="submenu-title">
                                                                            <h5>Coming Soon</h5>
                                                                            <div class="according-menu"><i class="fa fa-angle-right"></i></div></div>
                                                                        <ul class="submenu-content opensubmegamenu" style="display: none;">
                                                                            <li><a href="comingsoon.html">Coming Simple</a></li>
                                                                            <li><a href="comingsoon-bg-video.html">Coming with Bg video</a></li>
                                                                            <li><a href="comingsoon-bg-img.html">Coming with Bg Image</a></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                                <div class="col mega-box">
                                                                    <div class="link-section">
                                                                        <div class="submenu-title">
                                                                            <h5>Email templates</h5>
                                                                            <div class="according-menu"><i class="fa fa-angle-right"></i></div></div>
                                                                        <ul class="submenu-content opensubmegamenu" style="display: none;">
                                                                            <li><a href="basic-template.html">Basic Email</a></li>
                                                                            <li><a href="email-header.html">Basic With Header</a></li>
                                                                            <li><a href="template-email.html">Ecomerce Template</a></li>
                                                                            <li><a href="template-email-2.html">Email Template 2</a></li>
                                                                            <li><a href="ecommerce-templates.html">Ecommerce Email</a></li>
                                                                            <li><a href="email-order-success.html">Order Success</a></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="sidebar-main-title">
                                                    <div>
                                                        <h6>Miscellaneous</h6>
                                                    </div>
                                                </li>
                                                <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title" href="javascript:void(0)">
                                                        <svg class="stroke-icon">
                                                            <use href="../assets/svg/icon-sprite.svg#stroke-gallery"></use>
                                                        </svg>
                                                        <svg class="fill-icon">
                                                            <use href="../assets/svg/icon-sprite.svg#fill-gallery"></use>
                                                        </svg><span>Gallery</span><div class="according-menu"><i class="fa fa-angle-right"></i></div></a>
                                                    <ul class="sidebar-submenu" style="display: none;">
                                                        <li><a href="gallery.html">Gallery Grid</a></li>
                                                        <li><a href="gallery-with-description.html">Gallery Grid Desc</a></li>
                                                        <li><a href="gallery-masonry.html">Masonry Gallery</a></li>
                                                        <li><a href="masonry-gallery-with-disc.html">Masonry with Desc</a></li>
                                                        <li><a href="gallery-hover.html">Hover Effects</a></li>
                                                    </ul>
                                                </li>
                                                <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title" href="javascript:void(0)">
                                                        <svg class="stroke-icon">
                                                            <use href="../assets/svg/icon-sprite.svg#stroke-blog"></use>
                                                        </svg>
                                                        <svg class="fill-icon">
                                                            <use href="../assets/svg/icon-sprite.svg#fill-blog"></use>
                                                        </svg><span>Blog</span><div class="according-menu"><i class="fa fa-angle-right"></i></div></a>
                                                    <ul class="sidebar-submenu" style="display: none;">
                                                        <li><a href="blog.html">Blog Details</a></li>
                                                        <li><a href="blog-single.html">Blog Single</a></li>
                                                        <li><a href="add-post.html">Add Post</a></li>
                                                    </ul>
                                                </li>
                                                <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title link-nav" href="faq.html">
                                                        <svg class="stroke-icon">
                                                            <use href="../assets/svg/icon-sprite.svg#stroke-faq"></use>
                                                        </svg>
                                                        <svg class="fill-icon">
                                                            <use href="../assets/svg/icon-sprite.svg#fill-faq"></use>
                                                        </svg><span>FAQ</span><div class="according-menu"><i class="fa fa-angle-right"></i></div></a></li>
                                                <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title" href="javascript:void(0)">
                                                        <svg class="stroke-icon">
                                                            <use href="../assets/svg/icon-sprite.svg#stroke-job-search"></use>
                                                        </svg>
                                                        <svg class="fill-icon">
                                                            <use href="../assets/svg/icon-sprite.svg#fill-job-search"></use>
                                                        </svg><span>Job Search</span><div class="according-menu"><i class="fa fa-angle-right"></i></div></a>
                                                    <ul class="sidebar-submenu" style="display: none;">
                                                        <li><a href="job-cards-view.html">Cards view</a></li>
                                                        <li><a href="job-list-view.html">List View</a></li>
                                                        <li><a href="job-details.html">Job Details</a></li>
                                                        <li><a href="job-apply.html">Apply</a></li>
                                                    </ul>
                                                </li>
                                                <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title" href="javascript:void(0)">
                                                        <svg class="stroke-icon">
                                                            <use href="../assets/svg/icon-sprite.svg#stroke-learning"></use>
                                                        </svg>
                                                        <svg class="fill-icon">
                                                            <use href="../assets/svg/icon-sprite.svg#fill-learning"></use>
                                                        </svg><span>Learning</span><div class="according-menu"><i class="fa fa-angle-right"></i></div></a>
                                                    <ul class="sidebar-submenu" style="display: none;">
                                                        <li><a href="learning-list-view.html">Learning List</a></li>
                                                        <li><a href="learning-detailed.html">Detailed Course</a></li>
                                                    </ul>
                                                </li>
                                                <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title" href="javascript:void(0)">
                                                        <svg class="stroke-icon">
                                                            <use href="../assets/svg/icon-sprite.svg#stroke-maps"></use>
                                                        </svg>
                                                        <svg class="fill-icon">
                                                            <use href="../assets/svg/icon-sprite.svg#fill-maps"></use>
                                                        </svg><span>Maps</span><div class="according-menu"><i class="fa fa-angle-right"></i></div></a>
                                                    <ul class="sidebar-submenu" style="display: none;">
                                                        <li><a href="map-js.html">Maps JS</a></li>
                                                        <li><a href="vector-map.html">Vector Maps</a></li>
                                                    </ul>
                                                </li>
                                                <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title" href="javascript:void(0)">
                                                        <svg class="stroke-icon">
                                                            <use href="../assets/svg/icon-sprite.svg#stroke-editors"></use>
                                                        </svg>
                                                        <svg class="fill-icon">
                                                            <use href="../assets/svg/icon-sprite.svg#fill-editors"></use>
                                                        </svg><span>Editors</span><div class="according-menu"><i class="fa fa-angle-right"></i></div></a>
                                                    <ul class="sidebar-submenu" style="display: none;">
                                                        <li><a href="summernote.html">Summer Note</a></li>
                                                        <li><a href="ckeditor.html">CK editor</a></li>
                                                        <li><a href="simple-MDE.html">MDE editor</a></li>
                                                        <li><a href="ace-code-editor.html">ACE code editor </a></li>
                                                    </ul>
                                                </li>
                                                <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title link-nav" href="knowledgebase.html">
                                                        <svg class="stroke-icon">
                                                            <use href="../assets/svg/icon-sprite.svg#stroke-knowledgebase"></use>
                                                        </svg>
                                                        <svg class="fill-icon">
                                                            <use href="../assets/svg/icon-sprite.svg#fill-knowledgebase"></use>
                                                        </svg><span>Knowledgebase</span><div class="according-menu"><i class="fa fa-angle-right"></i></div></a></li>
                                                <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title link-nav" href="support-ticket.html">
                                                        <svg class="stroke-icon">
                                                            <use href="../assets/svg/icon-sprite.svg#stroke-support-tickets"></use>
                                                        </svg>
                                                        <svg class="fill-icon">
                                                            <use href="../assets/svg/icon-sprite.svg#fill-support-tickets"></use>
                                                        </svg><span>Support Ticket</span><div class="according-menu"><i class="fa fa-angle-right"></i></div></a></li>
                                            </div></div></div></div><div class="simplebar-placeholder" style="width: auto; height: 2229px;"></div></div><div class="simplebar-track simplebar-horizontal" style="visibility: hidden;"><div class="simplebar-scrollbar" style="width: 0px; display: none;"></div></div><div class="simplebar-track simplebar-vertical" style="visibility: visible;"><div class="simplebar-scrollbar" style="height: 78px; transform: translate3d(0px, 0px, 0px); display: block;"></div></div></ul>
                    </div>
                    <div class="right-arrow" id="right-arrow"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg></div>
                </nav>
            </div>
        </div>
        <!-- Page Sidebar Ends-->

        @yield('content')


        <!-- footer start-->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 footer-copyright d-flex flex-wrap align-items-center justify-content-between">
                        <p class="mb-0 f-w-600">Copyright 2024 © {{ config('app.name') }}  </p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>
<!-- latest jquery-->
<script src="{{ asset('backend_assets/js/jquery.min.js') }}"></script>
<!-- Bootstrap js-->
<script src="{{ asset('backend_assets/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
<!-- feather icon js-->
<script src="{{ asset('backend_assets/js/icons/feather-icon/feather.min.js') }}"></script>
<script src="{{ asset('backend_assets/js/icons/feather-icon/feather-icon.js') }}"></script>
<!-- scrollbar js-->
<script src="{{ asset('backend_assets/js/scrollbar/simplebar.js') }}"></script>
<script src="{{ asset('backend_assets/js/scrollbar/custom.js') }}"></script>
<!-- Sidebar jquery-->
<script src="{{ asset('backend_assets/js/config.js') }}"></script>
<!-- Plugins JS start-->
<script src="{{ asset('backend_assets/js/sidebar-menu.js') }}"></script>
<script src="{{ asset('backend_assets/js/sidebar-pin.js') }}"></script>
<script src="{{ asset('backend_assets/js/slick/slick.min.js') }}"></script>
<script src="{{ asset('backend_assets/js/slick/slick.js') }}"></script>
<script src="{{ asset('backend_assets/js/header-slick.js') }}"></script>
<script src="{{ asset('backend_assets/js/chart/apex-chart/apex-chart.js') }}"></script>
<script src="{{ asset('backend_assets/js/chart/apex-chart/stock-prices.js') }}"></script>
<script src="{{ asset('backend_assets/js/chart/apex-chart/moment.min.js') }}"></script>
<script src="{{ asset('backend_assets/js/notify/bootstrap-notify.min.js') }}"></script>
<!-- calendar js-->
<script src="{{ asset('backend_assets/js/dashboard/default.js') }}"></script>
<script src="{{ asset('backend_assets/js/notify/index.js') }}"></script>
<script src="{{ asset('backend_assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('backend_assets/js/datatable/datatables/datatable.custom.js') }}"></script>
<script src="{{ asset('backend_assets/js/datatable/datatables/datatable.custom1.js') }}"></script>
<script src="{{ asset('backend_assets/js/datepicker/date-range-picker/moment.min.js') }}"></script>
<script src="{{ asset('backend_assets/js/datepicker/date-range-picker/datepicker-range-custom.js') }}"></script>
<script src="{{ asset('backend_assets/js/typeahead/handlebars.js') }}"></script>
<script src="{{ asset('backend_assets/js/typeahead/typeahead.bundle.js') }}"></script>
<script src="{{ asset('backend_assets/js/typeahead/typeahead.custom.js') }}"></script>
<script src="{{ asset('backend_assets/js/typeahead-search/handlebars.js') }}"></script>
<script src="{{ asset('backend_assets/js/typeahead-search/typeahead-custom.js') }}"></script>
<script src="{{ asset('backend_assets/js/height-equal.js') }}"></script>
<script src="{{ asset('backend_assets/js/animation/wow/wow.min.js') }}"></script>
<!-- Plugins JS Ends-->
<!-- Theme js-->
<script src="{{ asset('backend_assets/js/script.js') }}"></script>
<script src="{{ asset('backend_assets/js/theme-customizer/customizer.js') }}"></script>


<!-- Plugin used-->
<script>new WOW().init();</script>
<script>

    async function initMap() {
        const fromInput = document.getElementById('location_map');
        const fromAutocomplete = new google.maps.places.Autocomplete(fromInput);
    }

    window.onload = initMap;

</script>
</body>
</html>
