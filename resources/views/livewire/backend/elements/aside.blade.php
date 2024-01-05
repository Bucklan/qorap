<div>
    <aside class="navbar-aside" id="offcanvas_aside">
        <div class="aside-top">
            <a href="#" class="brand-wrap">
{{--                <img src="{{asset('assets-back/imgs/theme/logo.svg')}}" class="logo" alt="Nest Dashboard" />--}}
            </a>
            <div>
                <button class="btn btn-icon btn-aside-minimize"><i class="text-muted material-icons md-menu_open"></i></button>
            </div>
        </div>
        <nav>
            <ul class="menu-aside">
                <li class="menu-item active">
                    <a class="menu-link" href="#">
                        <i class="icon material-icons md-home"></i>
                        <span class="text">Dashboard</span>
                    </a>
                </li>
                {{--            Products--}}
                <li class="menu-item has-submenu">
                    <a class="menu-link" href="#">
                        <i class="icon material-icons md-shopping_bag"></i>
                        <span class="text">Products</span>
                    </a>
                    <div class="submenu">
                        <a href="{{route('admin.products.index')}}">Product List</a>
                        <a href="{{route('admin.products.create')}}">Product Create</a>
                        <a href="#">Categories</a>
                    </div>
                </li>

                {{--            Orders--}}
                <li class="menu-item has-submenu">
                    <a class="menu-link" href="#">
                        <i class="icon material-icons md-shopping_cart"></i>
                        <span class="text">Orders</span>
                    </a>
                    <div class="submenu">
                        <a href="#">Order list</a>
                    </div>
                </li>

                <li class="menu-item has-submenu">
                    <a class="menu-link" href="#">
                        <i class="icon material-icons md-store"></i>
                        <span class="text">Shops</span>
                    </a>
                    <div class="submenu">
{{--                        <a href="{{route('admin.products.index')}}">Shops list</a>--}}
                        <a href="{{route('admin.shops.create')}}" >Shop create</a>
                    </div>
                </li>
                <li class="menu-item">
                    <a class="menu-link" href="#">
                        <i class="icon material-icons md-comment"></i>
                        <span class="text">Reviews</span>
                    </a>
                </li>
                <li class="menu-item">
                    <a class="menu-link" href="{{route('admin.shops.index')}}"> <i class="icon material-icons md-stars"></i> <span class="text">Brands</span> </a>
                </li>
                <li class="menu-item opacity-50">
                    <a class="menu-link" disabled href="#">
                        <i class="icon material-icons md-pie_chart"></i>
                        <span class="text">Statistics</span>
                    </a>
                </li>
            </ul>
            <hr />
            <br />
            <br />
        </nav>
    </aside>
</div>