<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400italic,700,700italic,900,900italic&amp;subset=latin,latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open%20Sans:300,400,400italic,600,600italic,700,700italic&amp;subset=latin,latin-ext" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/demo-bower/assets/css/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/demo-bower/assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/demo-bower/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/demo-bower/assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/demo-bower/assets/css/chosen.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/demo-bower/assets/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/demo-bower/assets/css/color-01.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/demo-bower/assets/css/flexslider.css') }}">
    @livewireStyles
</head>
<body class="home-page home-01 ">

<!-- mobile menu -->
<div class="mercado-clone-wrap">
    <div class="mercado-panels-actions-wrap">
        <a class="mercado-close-btn mercado-close-panels" href="#">x</a>
    </div>
    <div class="mercado-panels"></div>
</div>

<!--header-->
<header id="header" class="header header-style-1">
    <div class="container-fluid">
        <div class="row">
            <div class="topbar-menu-area">
                <div class="container">
                    <div class="topbar-menu right-menu">
                        <ul>
                            <li class="menu-item lang-menu menu-item-has-children parent">
                                <a title="English" href="{{ route('language', 'en') }}"><span class="img label-before"><img src="{{ asset('bower_components/demo-bower/assets/images/lang-en.png') }}" alt="lang-en"></span>{{ __('home.en') }}<i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                <ul class="submenu lang" >
                                    <li class="menu-item" ><a title="hungary" href="{{ route('language', 'vi') }}"><span class="img label-before"><img src="{{ asset('bower_components/demo-bower/assets/images/lang-vi.png') }}" alt="lang-vi"></span>{{ __('home.vi') }}</a></li>
                                </ul>
                            </li>
                            @if (Route::has('login'))
                                @auth
                                    @if (Auth::user()->role === 'ADM')
                                        <li class="menu-item menu-item-has-children parent" >
                                            <a title="My account" href="#">{{ __('home.my_account') }} ({{ Auth::user()->name }})<i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                            <ul class="submenu curency" >
                                                <li class="menu-item" >
                                                    <a title="Dashboard" href="{{ route('admin.dashboard') }}">{{ __('home.dashboad') }}</a>
                                                </li>
                                                <form method="POST" action="{{ route('logout') }}">
                                                    @csrf
                                                    <li class="menu-item logout-btn">
                                                        <a href="{{ route('logout') }}">{{ __('home.logout') }}</a>
                                                    </li>
                                                </form>
                                            </ul>
                                        </li>
                                    @else
                                        <li class="menu-item menu-item-has-children parent" >
                                                <a title="My account" href="#">My Account ({{ Auth::user()->name }})<i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                                <ul class="submenu curency" >
                                                    <li class="menu-item" >
                                                        <a title="Dashboard" href="{{ route('user.dashboard') }}">{{ __('home.dashboad') }}</a>
                                                    </li>
                                                    <form method="POST" action="{{ route('logout') }}">
                                                        @csrf
                                                        <li class="menu-item logout-btn">
                                                            <a href="{{ route('logout') }}">{{ __('home.logout') }}</a>
                                                        </li>
                                                    </form>
                                                </ul>
                                        </li>
                                    @endif
                                @else
                                    <li class="menu-item" ><a title="Register or Login" href="{{ route('login') }}">{{ __('home.login') }}</a></li>
                                    <li class="menu-item" ><a title="Register or Login" href="{{ route('register') }}">{{ __('home.register') }}</a></li>
                                @endif
                            @endif
                        </ul>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="mid-section main-info-area">

                    <div class="wrap-logo-top left-section">
                        <a href="/" class="link-to-home"><img src="{{ asset('bower_components/demo-bower/assets/images/logo-top-1.png') }}" alt="mercado"></a>
                    </div>

                    <div class="wrap-search center-section">
                        <div class="wrap-search-form">
                            <form action="#" id="form-search-top" name="form-search-top">
                                <input type="text" name="search" value="" placeholder="{{ __('home.search_placeholder') }}">
                                <button form="form-search-top" type="button"><i class="fa fa-search" aria-hidden="true"></i></button>
                                <div class="wrap-list-cate">
                                    <input type="hidden" name="product-cate" value="0" id="product-cate">
                                    <a href="#" class="link-control">{{ __('home.all_categories') }}</a>
                                    <ul class="list-cate">
                                        <li class="level-0">All Category</li>
                                        <li class="level-1">-Electronics</li>
                                        <li class="level-2">Batteries & Chargens</li>
                                        <li class="level-2">Headphone & Headsets</li>
                                        <li class="level-2">Mp3 Player & Acessories</li>
                                        <li class="level-1">-Smartphone & Table</li>
                                        <li class="level-2">Batteries & Chargens</li>
                                        <li class="level-2">Mp3 Player & Headphones</li>
                                        <li class="level-2">Table & Accessories</li>
                                        <li class="level-1">-Electronics</li>
                                        <li class="level-2">Batteries & Chargens</li>
                                        <li class="level-2">Headphone & Headsets</li>
                                        <li class="level-2">Mp3 Player & Acessories</li>
                                        <li class="level-1">-Smartphone & Table</li>
                                        <li class="level-2">Batteries & Chargens</li>
                                        <li class="level-2">Mp3 Player & Headphones</li>
                                        <li class="level-2">Table & Accessories</li>
                                    </ul>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="wrap-icon right-section">
                        <div class="wrap-icon-section minicart">
                            <a href="#" class="link-direction">
                                <i class="fa fa-shopping-basket" aria-hidden="true"></i>
                                <div class="left-info">
                                    <span class="index">4 {{ __('home.items') }}</span>
                                    <span class="title">{{ __('home.cart') }}</span>
                                </div>
                            </a>
                        </div>
                        <div class="wrap-icon-section show-up-after-1024">
                            <a href="#" class="mobile-navigation">
                                <span></span>
                                <span></span>
                                <span></span>
                            </a>
                        </div>
                    </div>

                </div>
            </div>

            <div class="nav-section header-sticky">
                <div class="primary-nav-section">
                    <div class="container">
                        <ul class="nav primary clone-main-menu" id="mercado_main" data-menuname="Main menu" >
                            <li class="menu-item home-icon">
                                <a href="/" class="link-term mercado-item-title"><i class="fa fa-home" aria-hidden="true"></i></a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('shop') }}" class="link-term mercado-item-title">{{ __('home.shop') }}</a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('cart') }}" class="link-term mercado-item-title">{{ __('home.cart') }}</a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('checkout') }}" class="link-term mercado-item-title">{{ __('home.checkout') }}</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

{{$slot}}

<footer id="footer">
    <div class="wrap-footer-content footer-style-1">

        <div class="wrap-function-info">
            <div class="container">
                <ul>
                    <li class="fc-info-item">
                        <i class="fa fa-truck" aria-hidden="true"></i>
                        <div class="wrap-left-info">
                            <h4 class="fc-name">{{ __('home.free_shipping') }}</h4>
                            <p class="fc-desc">{{ __('home.free_shipping_desc') }}</p>
                        </div>

                    </li>
                    <li class="fc-info-item">
                        <i class="fa fa-recycle" aria-hidden="true"></i>
                        <div class="wrap-left-info">
                            <h4 class="fc-name">{{ __('home.guarantee') }}</h4>
                            <p class="fc-desc">{{ __('home.guarantee_desc') }}</p>
                        </div>

                    </li>
                    <li class="fc-info-item">
                        <i class="fa fa-credit-card-alt" aria-hidden="true"></i>
                        <div class="wrap-left-info">
                            <h4 class="fc-name">{{ __('home.safe_payment') }}</h4>
                            <p class="fc-desc">{{ __('home.safe_payment_desc') }}</p>
                        </div>

                    </li>
                    <li class="fc-info-item">
                        <i class="fa fa-life-ring" aria-hidden="true"></i>
                        <div class="wrap-left-info">
                            <h4 class="fc-name">{{ __('home.online_support') }}</h4>
                            <p class="fc-desc">{{ __('home.online_support_desc') }}</p>
                        </div>

                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>

<script src="{{ asset('bower_components/demo-bower/assets/js/jquery-1.12.4.minb8ff.js?ver=1.12.4') }}"></script>
<script src="{{ asset('bower_components/demo-bower/assets/js/jquery-ui-1.12.4.minb8ff.js?ver=1.12.4') }}"></script>
<script src="{{ asset('bower_components/demo-bower/assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('bower_components/demo-bower/assets/js/jquery.flexslider.js') }}"></script>
<script src="{{ asset('bower_components/demo-bower/assets/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('bower_components/demo-bower/assets/js/jquery.countdown.min.js') }}"></script>
<script src="{{ asset('bower_components/demo-bower/assets/js/jquery.sticky.js') }}"></script>
<script src="{{ asset('bower_components/demo-bower/assets/js/functions.js') }}"></script>
<script src="{{ asset('js/index.js') }}"></script>
@livewireScripts
</body>
</html>
