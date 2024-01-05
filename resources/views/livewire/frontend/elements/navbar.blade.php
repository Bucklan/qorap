<div>
    <header class="header-area header-style-1 header-height-2">
        <div class="header-middle header-middle-ptb-1 d-none d-lg-block">
            <div class="container">
                <div class="header-wrap">
                    <div class="logo logo-width-1">
                        <a href="#"><img
                                    src="{{asset('logoo.svg')}}" height="70"
                                    alt="logo"/></a>
                    </div>
                    <div class="header-right">
                        <div class="search-style-2">
                            <form action="#">
                                <select class="select-active">
                                    <option>
                                        All
                                        Categories
                                    </option>
                                    <option>
                                        Milks
                                        and
                                        Dairies
                                    </option>
                                    <option>
                                        Wines
                                        &
                                        Alcohol
                                    </option>
                                    <option>
                                        Clothing
                                        &
                                        Beauty
                                    </option>
                                    <option>
                                        Pet
                                        Foods
                                        &
                                        Toy
                                    </option>
                                    <option>
                                        Fast
                                        food
                                    </option>
                                    <option>
                                        Baking
                                        material
                                    </option>
                                    <option>
                                        Vegetables
                                    </option>
                                    <option>
                                        Fresh
                                        Seafood
                                    </option>
                                    <option>
                                        Noodles
                                        &
                                        Rice
                                    </option>
                                    <option>
                                        Ice
                                        cream
                                    </option>
                                </select>
                                <input type="text"
                                       placeholder="Search for items..."/>
                            </form>
                        </div>
                        @isset(Auth::user()->id)
                        @if(!Auth::user()->hasRole(\App\Enums\User\Role::USER)) <a href="{{route('admin.')}}">Admin Page</a> @endif
                        @endisset
                        <div class="header-action">
                            <div class="header-action-2">
                                <div class="search-location">
                                    <form action="#">
                                        <select class="select-active" >
                                                Your
                                                Location
                                            </option>
                                        @foreach($cities as $city)
                                                <option value="{{$city->id}}">{{$city->name}}</option>
                                            @endforeach

                                        </select>
                                    </form>
                                </div>
                                <div class="header-action-icon-2">
                                    <a href="#">
                                        <i class="fi fi-rs-heart"></i>
                                        <span class="pro-count blue">6</span>
                                    </a>
                                    <a href="#"></a>
                                </div>
                                <div class="header-action-icon-2">
                                    <a class="mini-cart-icon"
                                       href="{{route('cart.index')}}">
                                        <i class="fi fi-rs-shopping-cart"></i>
                                        <span class="pro-count blue">2</span>
                                    </a>
                                    <a href="{{route('cart.index')}}" ></a>
                                </div>
                                <div class="header-action-icon-2">
                                    <a href="#">
                                        <i class="fi fi-rs-user"></i>
                                        <span class="lable ml-0">
                                            {{Auth::user() ? Auth::user()->name: ''}}
                                        </span>
                                    </a>
                                    <div class="cart-dropdown-wrap cart-dropdown-hm2 account-dropdown">
                                        <ul>
                                            @auth
                                            <li>
                                                <a href="{{route('profile.index')}}"><i
                                                            class="fi fi-rs-user mr-10"></i>My
                                                    Account</a>
                                            </li>
                                            <li>
                                                <a href="#"><i
                                                            class="fi fi-rs-settings-sliders mr-10"></i>Setting</a>
                                            </li>
                                            <li>
                                                <form action="{{route('logout')}}" method="post">
                                                    @csrf
                                                    @method('POST')
                                                    <button class="btn-outline-none bg-white"><i
                                                                class="fi fi-rs-sign-out mr-10"></i>Sign
                                                        out</button>
                                                </form>
                                            </li>
                                            @else
                                                <li>
                                                    <a href="{{route('login')}}"><i class="fi fi-rs-sign-in-alt mr-10"></i>Sign in</a>
                                                </li>
                                                <li>
                                                    <a href="{{route('register')}}"><i class="fi fi-rs-registered mr-10"></i>Register</a>
                                                </li>
                                            @endauth
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-bottom header-bottom-bg-color sticky-bar">
            <div class="container">
                <div class="header-wrap header-space-between position-relative">
                    <div class="logo logo-width-1 d-block d-lg-none">
                        <a href="#"><img
                                    src="{{asset('logoo.svg')}}"
                                    alt="logo"/></a>
                    </div>
                    <div class="header-nav d-none d-lg-flex">

                        <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block font-heading">
                            <nav>
                                <ul>

                                    <li>
                                        <a href="{{route('dashboard')}}">Home</a>
                                    </li>
                                    <li>
                                        <a href="{{route('products.index')}}">Products</a>
                                    </li>
                                    <li>
                                        <a href="#">Vendors <i class="fi-rs-angle-down"></i></a>
                                        <ul class="sub-menu">
                                            <li><a href="{{route('shops.index')}}">Shops</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#">Contact</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </header>
</div>