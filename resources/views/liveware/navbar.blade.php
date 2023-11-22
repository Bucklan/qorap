<div>
    <header class="header-area header-style-1 header-height-2">
        <div class="header-middle header-middle-ptb-1 d-none d-lg-block">
            <div class="container">
                <div class="header-wrap">
                    <div class="logo logo-width-1">
                        <a href="index.html"><img
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
                        <div class="header-action-right">
                            <div class="header-action-2">
                                <div class="search-location">
                                    <form action="#">
                                        <select class="select-active">
                                            <option>
                                                Your
                                                Location
                                            </option>
                                            <option>
                                                Alabama
                                            </option>
                                            <option>
                                                Alaska
                                            </option>
                                            <option>
                                                Arizona
                                            </option>
                                            <option>
                                                Delaware
                                            </option>
                                            <option>
                                                Florida
                                            </option>
                                            <option>
                                                Georgia
                                            </option>
                                            <option>
                                                Hawaii
                                            </option>
                                            <option>
                                                Indiana
                                            </option>
                                            <option>
                                                Maryland
                                            </option>
                                            <option>
                                                Nevada
                                            </option>
                                            <option>
                                                New
                                                Jersey
                                            </option>
                                            <option>
                                                New
                                                Mexico
                                            </option>
                                            <option>
                                                New
                                                York
                                            </option>
                                        </select>
                                    </form>
                                </div>
                                <div class="header-action-icon-2">
                                    <a href="shop-wishlist.html">
                                        <img class="svgInject"
                                             alt="Nest"
                                             src="assets-front/imgs/theme/icons/icon-heart.svg"/>
                                        <span class="pro-count blue">6</span>
                                    </a>
                                    <a href="shop-wishlist.html"><span
                                                class="lable">Wishlist</span></a>
                                </div>
                                <div class="header-action-icon-2">
                                    <a class="mini-cart-icon"
                                       href="shop-cart.html">
                                        <img alt="Nest"
                                             src="assets-front/imgs/theme/icons/icon-cart.svg"/>
                                        <span class="pro-count blue">2</span>
                                    </a>
                                    <a href="shop-cart.html"><span
                                                class="lable">Cart</span></a>
                                    <div class="cart-dropdown-wrap cart-dropdown-hm2">
                                        <ul>
                                            <li>
                                                <div class="shopping-cart-img">
                                                    <a href="shop-product-right.html"><img
                                                                alt="Nest"
                                                                src="assets-front/imgs/shop/thumbnail-3.jpg"/></a>
                                                </div>
                                                <div class="shopping-cart-title">
                                                    <h4>
                                                        <a href="shop-product-right.html">Daisy
                                                            Casual
                                                            Bag</a>
                                                    </h4>
                                                    <h4>
                                                        <span>1 × </span>$800.00
                                                    </h4>
                                                </div>
                                                <div class="shopping-cart-delete">
                                                    <a href="#"><i
                                                                class="fi-rs-cross-small"></i></a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="shopping-cart-img">
                                                    <a href="shop-product-right.html"><img
                                                                alt="Nest"
                                                                src="assets-front/imgs/shop/thumbnail-2.jpg"/></a>
                                                </div>
                                                <div class="shopping-cart-title">
                                                    <h4>
                                                        <a href="shop-product-right.html">Corduroy
                                                            Shirts</a>
                                                    </h4>
                                                    <h4>
                                                        <span>1 × </span>$3200.00
                                                    </h4>
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
                                                    <span>$4000.00</span>
                                                </h4>
                                            </div>
                                            <div class="shopping-cart-button">
                                                <a href="shop-cart.html"
                                                   class="outline">View
                                                    cart</a>
                                                <a href="shop-checkout.html">Checkout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="header-action-icon-2">
                                    <a href="page-account.html">
                                        <img class="svgInject"
                                             alt="Nest"
                                             src="assets-front/imgs/theme/icons/icon-user.svg"/>
                                    </a>
                                    <a href="page-account.html"><span
                                                class="lable ml-0">{{Auth::user() ? Auth::user()->name: 'Account'}}</span></a>
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
                                                <form action="{{route('logout',Auth::user())}}" method="post">
                                                    @csrf
                                                    @method('POST')
                                                    <button ><i
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
                                        <a href="#">Vendors <i class="fi-rs-angle-down"></i></a>
                                        <ul class="sub-menu">
                                            <li><a href="vendors-grid.html">Vendors Grid</a></li>
                                            <li><a href="vendors-list.html">Vendors List</a></li>
                                            <li><a href="vendor-details-1.html">Vendor Details 01</a></li>
                                            <li><a href="vendor-details-2.html">Vendor Details 02</a></li>
                                            <li><a href="vendor-dashboard.html">Vendor Dashboard</a></li>
                                            <li><a href="vendor-guide.html">Vendor Guide</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="page-contact.html">Contact</a>
                                    </li>
                                    <li class="position-static">
                                        <a href="#">Mega menu <i class="fi-rs-angle-down"></i></a>
                                        <ul class="mega-menu">
                                            <li class="sub-mega-menu sub-mega-menu-width-22">
                                                <a class="menu-title" href="#">Fruit & Vegetables</a>
                                                <ul>
                                                    <li><a href="shop-product-right.html">Meat & Poultry</a></li>
                                                    <li><a href="shop-product-right.html">Fresh Vegetables</a></li>
                                                    <li><a href="shop-product-right.html">Herbs & Seasonings</a></li>
                                                    <li><a href="shop-product-right.html">Cuts & Sprouts</a></li>
                                                    <li><a href="shop-product-right.html">Exotic Fruits & Veggies</a></li>
                                                    <li><a href="shop-product-right.html">Packaged Produce</a></li>
                                                </ul>
                                            </li>
                                            <li class="sub-mega-menu sub-mega-menu-width-22">
                                                <a class="menu-title" href="#">Breakfast & Dairy</a>
                                                <ul>
                                                    <li><a href="shop-product-right.html">Milk & Flavoured Milk</a></li>
                                                    <li><a href="shop-product-right.html">Butter and Margarine</a></li>
                                                    <li><a href="shop-product-right.html">Eggs Substitutes</a></li>
                                                    <li><a href="shop-product-right.html">Marmalades</a></li>
                                                    <li><a href="shop-product-right.html">Sour Cream</a></li>
                                                    <li><a href="shop-product-right.html">Cheese</a></li>
                                                </ul>
                                            </li>
                                            <li class="sub-mega-menu sub-mega-menu-width-22">
                                                <a class="menu-title" href="#">Meat & Seafood</a>
                                                <ul>
                                                    <li><a href="shop-product-right.html">Breakfast Sausage</a></li>
                                                    <li><a href="shop-product-right.html">Dinner Sausage</a></li>
                                                    <li><a href="shop-product-right.html">Chicken</a></li>
                                                    <li><a href="shop-product-right.html">Sliced Deli Meat</a></li>
                                                    <li><a href="shop-product-right.html">Wild Caught Fillets</a></li>
                                                    <li><a href="shop-product-right.html">Crab and Shellfish</a></li>
                                                </ul>
                                            </li>
                                            <li class="sub-mega-menu sub-mega-menu-width-34">
                                                <div class="menu-banner-wrap">
                                                    <a href="shop-product-right.html"><img src="#" alt="Nest" /></a>
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
                                                            <a href="shop-product-right.html">Shop now</a>
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
                                <a href="shop-wishlist.html">
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
                                                <a href="shop-product-right.html"><img
                                                            alt="Nest"
                                                            src="assets-front/imgs/shop/thumbnail-3.jpg"/></a>
                                            </div>
                                            <div class="shopping-cart-title">
                                                <h4>
                                                    <a href="shop-product-right.html">Plain
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
                                                <a href="shop-product-right.html"><img
                                                            alt="Nest"
                                                            src="assets-front/imgs/shop/thumbnail-4.jpg"/></a>
                                            </div>
                                            <div class="shopping-cart-title">
                                                <h4>
                                                    <a href="shop-product-right.html">Macbook
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
                                            <a href="shop-cart.html">View
                                                cart</a>
                                            <a href="shop-checkout.html">Checkout</a>
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