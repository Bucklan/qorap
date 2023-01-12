<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('title')</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('images/favicon.ico')}}"/>
    <!-- Vendor CSS -->
    <link href="{{asset('css/vendor/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/vendor/vendor.min.css')}}}" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{asset('css/style-electronics.css')}}" rel="stylesheet">
    <!-- Custom font -->
    <link href="{{asset('fonts/icomoon/icons.css')}}" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
</head>
<body>
<header class="hdr-wrap">
    <!--    AFTER HEADER LOGOS-->
    <div class="hdr hdr-style4">
        <div class="hdr-content">
            <div class="container">
                <div class="row">
                    <div class="col-auto show-mobile">
                        <!-- MOBILE Menu Toggle -->
                        <div class="menu-toggle"><a href="#" class="mobilemenu-toggle"><i class="icon-menu"></i></a>
                        </div>
                        <!-- /MOBILE Menu Toggle -->
                    </div>
                    <div class="col-auto hdr-logo">
                        <a href="{{url('/')}}" class="logo">
                            <img srcset="{{asset('images/fixbox.png')}}" width="50" height="50" alt="Logo">
                        </a>

                    </div>
                    <div class="col hdr-banner">
                        <a href="#" class="bnr bnr--middle bnr--left" data-fontratio="7.95">
                            <div class="bnr-caption bnr-caption-carousel js-bnr-caption-carousel"
                                 style="padding: 0 0 0 45%">

                            </div>
                        </a>
                    </div>
                    <div class="hdr-links-wrap col-auto ml-auto">
                        <div class="hdr-group-link hide-mobile">
                            <div class="hdr-inline-link">

                                <!-- Header Language -->
                                @can('viewAny',App\Models\User::class)
                                    <div class="dropdn_adminpage">
                                        <div class="dropdn dropdn_language dropdn_language--noimg dropdn_caret">
                                            <a href="{{route('adm.users.index')}}"
                                               class="dropdn-link js-dropdn-link"><span
                                                    class="js-dropdn-select-current">{{__('messages.Admin page')}}</span><i
                                                    class="icon-angle-down"></i></a>
                                        </div>
                                    </div>
                                @endcan
                                @can('forPartner',App\Models\User::class)
                                    <div class="dropdn_adminpage">
                                        <div class="dropdn dropdn_language dropdn_language--noimg dropdn_caret">
                                            <a href="{{route('partner.myGifts')}}"
                                               class="dropdn-link js-dropdn-link"><span
                                                    class="js-dropdn-select-current">{{__('messages.Admin page')}}</span><i
                                                    class="icon-angle-down"></i></a>
                                        </div>
                                    </div>
                                @endcan
                                <div class="dropdn_language">
                                    <div class="dropdn dropdn_language dropdn_language--noimg dropdn_caret">
                                        <a href="#" class="dropdn-link js-dropdn-link"><span
                                                class="js-dropdn-select-current">{{config('app.languages')[app()->getLocale()]}}</span><i
                                                class="icon-angle-down"></i></a>
                                        <div class="dropdn-content">
                                            <ul>
                                                @foreach(config('app.languages') as $ln => $languages)
                                                    <li class="@if($ln==app()->getLocale()) active
                                               @endif"><a href="{{route('switch.lang',$ln)}}"><img
                                                                src="{{asset('images/flags/'.$ln.'.png')}}"
                                                                alt="">{{$languages}}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Header Language -->
                                <!-- Header Currency -->
                                <div class="dropdn_currency">

                                </div>
                                <!-- /Header Currency -->
                            </div>
                        </div>
                        <div class="hdr-inline-link">
                            <!-- Header Search -->
                            <div class="search_container_desktop">
                                <div class="dropdn dropdn_search dropdn_fullwidth">
                                    <a href="#" class="dropdn-link  js-dropdn-link only-icon"><i
                                            class="icon-search"></i><span class="dropdn-link-txt">Search</span></a>
                                    <div class="dropdn-content">
                                        <div class="container">
                                            <form method="get" action="{{route('gifts.search')}}" class="search search-off-popular">
                                                <input name="name" type="text" class="search-input input-empty"
                                                       placeholder="{{__('messages.searchplaceholder')}}">
                                                <button class="search-button"><i class="icon-search"></i>
                                                </button>
                                                <a href="#" class="search-close js-dropdn-close"><i
                                                        class="icon-close-thin"></i></a>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Header Search -->
                            <!-- Header Account -->
                            <div class="dropdn dropdn_account dropdn_fullheight">
                                <a href="#" @auth title="My Balance: {{\Illuminate\Support\Facades\Auth::user()->my_balance}} KZT" @endauth class="dropdn-link js-dropdn-link js-dropdn-link only-icon"
                                   data-panel="#dropdnAccount">@guest<i
                                        class="icon-user"></i>@else{{ Auth::user()->name }}@endguest<span
                                        class="dropdn-link-txt"></span></a>
                            </div>
                            <!-- /Header Account -->
                            <!-- Header Compare -->
                            <div class="dropdn dropdn_compare">
                                <a href="{{route('selected')}}" class="dropdn-link only-icon compare-link ">
                                    <i class="icon-heart"></i>
                                </a>
                            </div>

                            <!-- /Header Compare -->
                            <!--                            HEADER CARD-->
                            <div class="dropdn dropdn_fullheight minicart">
                                <a href="{{route('cart.index')}}" class="dropdn-link js-dropdn-link minicart-link">
                                    <i class="icon-basket"></i>
                                </a>
                            </div>
                            <!--                            ENDHEADERCARD-->
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="hdr-navline hdr-navline--light">
            <div class="container">
                <div class="row">
                    <div class="col hdr-navline-left">
                        <!--navigation-->
                        <div class="hdr-nav hide-mobile nav-holder">


                            <!--mmenu-->
                            <ul class="mmenu mmenu-js">
                                @isset($categories)
                                    <li class="mmenu-item--mega"><a
                                            href="#"><span>{{__('messages.Gifts')}}</span></a>
                                        <div class="mmenu-submenu mmenu-submenu--has-bottom">
                                            <div class="mmenu-submenu-inside">
                                                <div class="container">
                                                    <div class="mmenu-left width-25">
                                                        <div class="mmenu-bnr-wrap">
                                                            <a href="{{route('gift.index')}}"
                                                               class="image-hover-scale image-container w-100"
                                                               style="padding-bottom: 102.91%">
                                                                <img
                                                                    src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                                    data-srcset="images/skins/electronics/menu/christmas-banner_412x.webp"
                                                                    class="lazyload fade-up" alt="Banner">
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="mmenu-cols column-4">
                                                        @foreach($categories as $cat)

                                                            <div class="mmenu-col">
                                                                <h3 class="submenu-title"><a
                                                                        href="{{route('gift.category',$cat->id)}}">{{$cat->{'name_'.app()->getLocale()} }}</a>
                                                                </h3>
                                                                <ul class="submenu-list">
                                                                    @foreach($cat->categories as $cs)
                                                                        <li><a href="{{route('gift.category',$cs->id)}}"
                                                                               class="active">{{$cs->{'name_'.app()->getLocale()} }}</a>
                                                                            <ul class="sub-level">
                                                                                @foreach($cs->categories as $ct)
                                                                                    <li>
                                                                                        <a href="{{route('gift.category',$ct->id)}}">{{$ct->{'name_'.app()->getLocale()} }}</a>
                                                                                    </li>
                                                                                @endforeach
                                                                            </ul>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        @endforeach
                                                        <div class="mmenu-col">
                                                            <h3 class="submenu-title"><a
                                                                    href="#">Kimge</a>
                                                            </h3>
                                                            <ul class="submenu-list">
                                                                @foreach($genders as $gender)
                                                                    <li>
                                                                        <a href="{{route('gift.category',$gender->id)}}">{{$gender->{'gender_'.app()->getLocale()} }}</a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                        <div class="mmenu-bottom justify-content-center">
                                                            <a href="{{route('gift.index')}}"><i class="icon-box-2"></i><b>{{__('buttons.allgifts')}}</b><i
                                                                    class="icon-arrow-right"></i></a>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @endisset
                            </ul>
                            <!--/mmenu-->


                        </div>
                        <!--//navigation-->
                    </div>
                    <div class="col-auto hdr-navline-right">
                        <!--                        EN TOBESINDE TURATYN REKLAMA-->
                    </div>
                </div>
            </div>
        </div>
    <!--    END AFTER HEADER LOGOS-->

</header>
<div class="header-side-panel">


    <!-- Mobile Menu -->
    <div class="mobilemenu js-push-mbmenu">
        <div class="mobilemenu-content">
            <div class="mobilemenu-close mobilemenu-toggle">{{__('buttons.close')}}</div>
            <div class="mobilemenu-scroll">
                <div class="mobilemenu-search"></div>
                <div class="nav-wrapper show-menu">
                    <div class="nav-toggle">
                        <span class="nav-back"><i class="icon-angle-left"></i></span>
                        <span class="nav-title"></span>
                        <a href="{{route('gift.index')}}" class="nav-viewall">{{__('buttons.allgifts')}}</a>
                    </div>
                    <ul class="nav nav-level-1">
                        @isset($categories)
                            @foreach($categories as $category)
                                <li><a href="{{route('gift.category',$category->id)}}">{{$category->{'name_'.app()->getLocale()} }}<span class="arrow"><i
                                                class="icon-angle-right"></i></span></a>
                                    <ul class="nav-level-2">
                                        @foreach($category->categories as $cat)
                                            <li><a href="{{route('gift.category',$cat->id)}}">{{$cat->{'name_'.app()->getLocale()} }}<span
                                                        class="arrow"><i
                                                            class="icon-angle-right"></i></span></a>
                                                <ul class="nav-level-3">
                                                    @foreach($cat->categories as $ct)
                                                        <li>
                                                            <a href="{{route('gift.category',$ct->id)}}">{{$ct->{'name_'.app()->getLocale()} }}</a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </li>

                                        @endforeach
                                    </ul>
                                </li>
                            @endforeach
                        @endisset
                            @isset($genders)
                            <li><a href="#">Kimge<span class="arrow"><i class="icon-angle-right"></i></span></a>
                                <ul class="nav-level-2">
                                    @foreach($genders as $gender)
                                        <li><a href="{{route('gift.gender',$gender->id)}}">{{$gender->{'gender_'.app()->getLocale()} }}<span
                                                    class="arrow"><i
                                                        class="icon-angle-right"></i></span></a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        @endisset
                    </ul>



                </div>
                <div class="mobilemenu-bottom">
                    <div class="mobilemenu-currency">
                        <!-- Header Currency -->
                        <div class="dropdn_currency">

                        </div>
                        <!-- /Header Currency -->
                    </div>
                    <div class="mobilemenu-language">
                        <!-- Header Language -->
                        <div class="dropdn_language">
                            <div class="dropdn dropdn_language dropdn_language--noimg dropdn_caret">
                                <a href="#" class="dropdn-link js-dropdn-link"><span
                                        class="js-dropdn-select-current">{{config('app.languages')[app()->getLocale()]}}</span><i
                                        class="icon-angle-down"></i></a>
                                <div class="dropdn-content">
                                    <ul>
                                        @foreach(config('app.languages') as $ln => $languages)
                                            <li class="@if(app()->getLocale()==$ln) active @endif"><a
                                                    href="{{route('switch.lang',$ln)}}"><img
                                                        src="{{asset('images/flags/'.$ln.'.png')}}"
                                                        alt="">{{$languages}}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- /Header Language -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Mobile Menu -->


    <!--    LOGIN-->
    <div class="dropdn-content account-drop" id="dropdnAccount">
        <div class="dropdn-content-block">
            <div class="dropdn-close"><span class="js-dropdn-close">{{__('buttons.close')}}</span></div>
            <ul>
                @guest
                    @if(Route::has('register.form'))
                        <li><a href="{{ route('register.form') }}"><span>{{ __('messages.register') }}</span><i
                                    class="icon-user2"></i></a></li>
                    @endif

                    <div class="dropdn-form-wrapper">
                        <h5>{{__('login.signin')}}</h5>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="email"
                                       class="form-control form-control--sm  @error('email') is-invalid @enderror"
                                       placeholder="{{__('login.email')}}">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="password" name="password"
                                       class="form-control form-control--sm @error('password') is-invalid @enderror"
                                       placeholder="{{__('login.password')}}">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <button class="btn">{{__('buttons.login')}}</button>
                        </form>
                    </div>
                @else
                    <li><a href="{{route('profile.form')}}"><span>{{ __('messages.profile') }}</span><i
                                class="icon-user2"></i></a></li>
                    <li><a href="{{route('Getbalance')}}"><span>{{__('add balance')}}</span><i class="icon-card"></i></a></li>
                    <li><a class="dropdown-item" href="#" data-toggle="modal"
                           data-target="#logoutModal" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('messages.log out') }}<i class="icon-login"></i>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>

                @endguest

            </ul>
        </div>
        <div class="drop-overlay js-dropdn-close"></div>
    </div>
    <!--    ENDLOGIN-->




    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    @if(session('message'))
                        <div class="alert alert-success" role="alert">
                            {{session('message')}}
                        </div>
                    @endif
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <!--    CONTENT-->
        <div class="page-content py-3">
            @yield('content')
        </div>
        <!--    ENDCONTENT-->

    </div>


    <!--FOOTER-->
    <footer class="page-footer footer-style-3 mt-0">
        <div class="footer-top footer-top--bg footer--dark">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="footer-block">
                            <div class="footer-logo">
                                <a href="index.html" class="logo"><h1 class="fa-stack-1x text-white"
                                                                      style="margin-left: 150px;margin-top: 50px">
                                        FIXBOX</h1></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-10">
                        <div class="footer-block">
                            <ul class="footer-list-inline">
                                <li><a href="{{url('/profile')}}">{{__('footer.myaccount')}}</a></li>
                                <li><a href="{{url('/cart')}}">{{__('footer.viewcart')}}</a></li>
                                <li><a href="{{url('/selected')}}">{{__('footer.mywishlist')}}</a></li>
                                <li><a href="{{url('/partner')}}">{{__('footer.I want to become your partner')}}</a></li>
                                <li><a href="{{url('/profile')}}">{{__('footer.orderhistory')}}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom footer-bottom--bg">
            <div class="container text-center">
                <div class="footer-copyright">
                    <a href="#">© FixBox</a> 2022 {{__('footer.copyright')}}
                </div>
            </div>
        </div>
    </footer>
    <!--ENDFOOTER-->

</div>

    {{--SCRIPT--}}
    <script src="{{asset('js/vendor-special/lazysizes.min.js')}}"></script>
    <script src="{{asset('js/vendor-special/ls.bgset.min.js')}}"></script>
    <script src="{{asset('js/vendor-special/ls.aspectratio.min.js')}}"></script>
    <script src="{{asset('js/vendor-special/jquery.min.js')}}"></script>
    <script src="{{asset('js/vendor-special/jquery.ez-plus.js')}}"></script>
    <script src="{{asset('js/vendor-special/instafeed.min.js')}}"></script>
    <script src="{{asset('js/vendor/vendor.min.js')}}"></script>
    <script src="{{asset('js/app-html.js')}}"></script>
</body>
</html>
