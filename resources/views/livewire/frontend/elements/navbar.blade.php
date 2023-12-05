<div>
    <header class="header-area header-style-1 header-height-2">
        <div class="header-middle header-middle-ptb-1 d-none d-lg-block">
            <div class="container">
                <div class="header-wrap">
                    <div class="logo logo-width-1">
                        <a href="#"><img
                                    src="assets-front/imgs/theme/logo.svg"
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
                                    <a href="shop-wishlist.html">
                                        <i class="fi fi-rs-heart"></i>
                                        <span class="pro-count blue">6</span>
                                    </a>
                                    <a href="shop-wishlist.html"></a>
                                </div>
                                <div class="header-action-icon-2">
                                    <a class="mini-cart-icon"
                                       href="shop-cart.html">
                                        <i class="fi fi-rs-shopping-cart"></i>
                                        <span class="pro-count blue">2</span>
                                    </a>
                                    <a href="shop-cart.html" ></a>
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
                                                <a href="page-account.html"><i
                                                            class="fi fi-rs-user mr-10"></i>My
                                                    Account</a>
                                            </li>
                                            <li>
                                                <a href="page-account.html"><i
                                                            class="fi fi-rs-location-alt mr-10"></i>Order
                                                    Tracking</a>
                                            </li>
                                            <li>
                                                <a href="page-account.html"><i
                                                            class="fi fi-rs-label mr-10"></i>My
                                                    Voucher</a>
                                            </li>
                                            <li>
                                                <a href="shop-wishlist.html"><i
                                                            class="fi fi-rs-heart mr-10"></i>My
                                                    Wishlist</a>
                                            </li>
                                            <li>
                                                <a href="page-account.html"><i
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
                        <a href="index.html"><img
                                    src="assets-front/imgs/theme/logo.svg"
                                    alt="logo"/></a>
                    </div>
                    <div class="header-nav d-none d-lg-flex">

                        <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block font-heading">
                            <nav>
                                <ul>

                                    <li>
                                        <a href="page-about.html">About</a>
                                    </li>
                                    <li>
                                        <a href="{{route('products.index')}}">Products</a>
                                    </li>
                                    <li>
                                        <a href="#">Vendors <i class="fi-rs-angle-down"></i></a>
                                        <ul class="sub-menu">
                                            <li><a href="{{route('shops.index')}}">Shops</a></li>
                                            <li><a href="#">Vendors List</a></li>
                                            <li><a href="#">Vendor Details 01</a></li>
                                            <li><a href="#">Vendor Details 02</a></li>
                                            <li><a href="#">Vendor Dashboard</a></li>
                                            <li><a href="#">Vendor Guide</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#">Contact</a>
                                    </li>
                                    <li class="position-static">
                                        <a href="#">Mega menu <i class="fi-rs-angle-down"></i></a>
                                        <ul class="mega-menu">
                                            <li class="sub-mega-menu sub-mega-menu-width-22">
                                                <a class="menu-title" href="#">Fruit & Vegetables</a>
                                                <ul>
                                                    <li><a href="#">Meat & Poultry</a></li>
                                                    <li><a href="#">Fresh Vegetables</a></li>
                                                    <li><a href="#">Herbs & Seasonings</a></li>
                                                    <li><a href="#">Cuts & Sprouts</a></li>
                                                    <li><a href="#">Exotic Fruits & Veggies</a></li>
                                                    <li><a href="#">Packaged Produce</a></li>
                                                </ul>
                                            </li>
                                            <li class="sub-mega-menu sub-mega-menu-width-22">
                                                <a class="menu-title" href="#">Breakfast & Dairy</a>
                                                <ul>
                                                    <li><a href="#">Milk & Flavoured Milk</a></li>
                                                    <li><a href="#">Butter and Margarine</a></li>
                                                    <li><a href="#">Eggs Substitutes</a></li>
                                                    <li><a href="#">Marmalades</a></li>
                                                    <li><a href="#">Sour Cream</a></li>
                                                    <li><a href="#">Cheese</a></li>
                                                </ul>
                                            </li>
                                            <li class="sub-mega-menu sub-mega-menu-width-22">
                                                <a class="menu-title" href="#">Meat & Seafood</a>
                                                <ul>
                                                    <li><a href="#">Breakfast Sausage</a></li>
                                                    <li><a href="#">Dinner Sausage</a></li>
                                                    <li><a href="#">Chicken</a></li>
                                                    <li><a href="#">Sliced Deli Meat</a></li>
                                                    <li><a href="#">Wild Caught Fillets</a></li>
                                                    <li><a href="#">Crab and Shellfish</a></li>
                                                </ul>
                                            </li>
                                            <li class="sub-mega-menu sub-mega-menu-width-34">
                                                <div class="menu-banner-wrap">
                                                    <a href="#"><img src="#" alt="Nest" /></a>
                                                    <div class="menu-banner-content">
                                                        <h4>Hot deals</h4>
                                                        <h3>
                                                            Don't miss<br />
                                                            Trending
                                                        </h3>
                                                        <div class="menu-banner-price">
                                                            <span class="new-price text-success">Save to 50%</span>
                                                        </div>
                                                        <div class="menu-banner-btn">
                                                            <a href="#">Shop now</a>
                                                        </div>
                                                    </div>
                                                    <div class="menu-banner-discount">
                                                        <h3>
                                                            <span>25%</span>
                                                            off
                                                        </h3>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>

                    <div class="header-action-right d-block d-lg-none">
                        <div class="header-action-2">
                            <div class="header-action-icon-2">
                                <a href="#">
                                    <img alt="Nest"
                                         src="assets-front/imgs/theme/icons/icon-heart.svg"/>
                                    <span class="pro-count white">4</span>
                                </a>
                            </div>
                            <div class="header-action-icon-2">
                                <a class="mini-cart-icon"
                                   href="#">
                                    <img alt="Nest"
                                         src="assets-front/imgs/theme/icons/icon-cart.svg"/>
                                    <span class="pro-count white">2</span>
                                </a>
                                <div class="cart-dropdown-wrap cart-dropdown-hm2">
                                    <ul>
                                        <li>
                                            <div class="shopping-cart-img">
                                                <a href="#"><img
                                                            alt="Nest"
                                                            src="assets-front/imgs/shop/thumbnail-3.jpg"/></a>
                                            </div>
                                            <div class="shopping-cart-title">
                                                <h4>
                                                    <a href="#">Plain
                                                        Striola
                                                        Shirts</a>
                                                </h4>
                                                <h3>
                                                    <span>1 × </span>$800.00
                                                </h3>
                                            </div>
                                            <div class="shopping-cart-delete">
                                                <a href="#"><i
                                                            class="fi-rs-cross-small"></i></a>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="shopping-cart-img">
                                                <a href="#"><img
                                                            alt="Nest"
                                                            src="assets-front/imgs/shop/thumbnail-4.jpg"/></a>
                                            </div>
                                            <div class="shopping-cart-title">
                                                <h4>
                                                    <a href="#">Macbook
                                                        Pro
                                                        2022</a>
                                                </h4>
                                                <h3>
                                                    <span>1 × </span>$3500.00
                                                </h3>
                                            </div>
                                            <div class="shopping-cart-delete">
                                                <a href="#"><i
                                                            class="fi-rs-cross-small"></i></a>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="shopping-cart-footer">
                                        <div class="shopping-cart-total">
                                            <h4>
                                                Total
                                                <span>$383.00</span>
                                            </h4>
                                        </div>
                                        <div class="shopping-cart-button">
                                            <a href="#">View
                                                cart</a>
                                            <a href="#">Checkout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
</div>