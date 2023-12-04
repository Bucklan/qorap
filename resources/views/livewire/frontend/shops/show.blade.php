<div>


    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                    <span></span> Store <span></span>
                    {{$shop->name}}
                </div>
            </div>
        </div>
        <div class="container mb-30">
            <div class="archive-header-2 text-center pt-80 pb-50">
                <h1 class="display-2 mb-50">{{$shop->name}}</h1>
                <div class="row">
                    <div class="col-lg-5 mx-auto">
                        <div class="sidebar-widget-2 widget_search mb-50">
                            <div class="search-form">
                                <form action="#">
                                    <input type="text"
                                           placeholder="Search in this store..."/>
                                    <button type="submit">
                                        <i class="fi-rs-search"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row flex-row-reverse">
                <div class="col-lg-4-5">
                    <div class="shop-product-fillter">
                        <div class="totall-product">
                            <p>
                                We
                                found
                                <strong class="text-brand">{{count($shop->products)}}</strong>
                                items
                                for
                                you!
                            </p>
                        </div>
                        <div class="sort-by-product-area">
                            <div class="sort-by-cover mr-10">
                                <div class="sort-by-product-wrap">
                                    <div class="sort-by">
                                        <span><i class="fi-rs-apps"></i>Show:</span>
                                    </div>
                                    <div class="sort-by-dropdown-wrap">
                                        <span> 50 <i
                                                    class="fi-rs-angle-small-down"></i></span>
                                    </div>
                                </div>
                                <div class="sort-by-dropdown">
                                    <ul>
                                        <li>
                                            <a class="active"
                                               href="#">50</a>
                                        </li>
                                        <li>
                                            <a href="#">100</a>
                                        </li>
                                        <li>
                                            <a href="#">150</a>
                                        </li>
                                        <li>
                                            <a href="#">200</a>
                                        </li>
                                        <li>
                                            <a href="#">All</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="sort-by-cover">
                                <div class="sort-by-product-wrap">
                                    <div class="sort-by">
                                        <span><i class="fi-rs-apps-sort"></i>Sort by:</span>
                                    </div>
                                    <div class="sort-by-dropdown-wrap">
                                        <span> Featured <i
                                                    class="fi-rs-angle-small-down"></i></span>
                                    </div>
                                </div>
                                <div class="sort-by-dropdown">
                                    <ul>
                                        <li>
                                            <a class="active"
                                               href="#">Featured</a>
                                        </li>
                                        <li>
                                            <a href="#">Price:
                                                Low
                                                to
                                                High</a>
                                        </li>
                                        <li>
                                            <a href="#">Price:
                                                High
                                                to
                                                Low</a>
                                        </li>
                                        <li>
                                            <a href="#">Release
                                                Date</a>
                                        </li>
                                        <li>
                                            <a href="#">Avg.
                                                Rating</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row product-grid">
                        @foreach($shop->products as $product)
                            <livewire:frontend.components.product-cart
                                    :product="$product"
                                    :key="$product->id"/>
                        @endforeach
                    </div>
                    <!--product grid-->
                    <div class="pagination-area mt-20 mb-20">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-start">
                                <li class="page-item">
                                    <a class="page-link"
                                       href="#"><i
                                                class="fi-rs-arrow-small-left"></i></a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link"
                                       href="#">1</a>
                                </li>
                                <li class="page-item active">
                                    <a class="page-link"
                                       href="#">2</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link"
                                       href="#">3</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link dot"
                                       href="#">...</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link"
                                       href="#">6</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link"
                                       href="#"><i
                                                class="fi-rs-arrow-small-right"></i></a>
                                </li>
                            </ul>
                        </nav>
                    </div>

                    <!--End Deals-->
                </div>
                <div class="col-lg-1-5 primary-sidebar sticky-sidebar">
                    <div class="sidebar-widget widget-store-info mb-30 bg-3 border-0">
                        <div class="vendor-logo mb-30">
                            <img src="https://tailwindui.com/img/ecommerce-images/product-page-01-related-product-01.jpg"
                                 alt=""/>
                        </div>
                        <div class="vendor-info">
                            <div class="product-category">
                                <span class="text-muted">Since 2012</span>
                            </div>
                            <h4 class="mb-5">
                                <a href="#"
                                   class="text-heading">{{$shop->name}}</a>
                            </h4>
                            <div class="product-rate-cover mb-15">
                                <div class="product-rate d-inline-block">
                                    <div class="product-rating"
                                         style="width: 90%"></div>
                                </div>
                                <span class="font-small ml-5 text-muted"> (4.0)</span>
                            </div>
                            <div class="vendor-des mb-30">
                                <p class="font-sm text-heading">
                                    Got a smooth, buttery spread in your fridge? Chances are
                                    good that it's Good Chef. This brand made Lionto's list of the
                                    most popular grocery brands across the country.
                                </p>
                            </div>
                            <div class="follow-social mb-20">
                                <h6 class="mb-15">
                                    Follow
                                    Us
                                </h6>
                                <ul class="social-network">
                                    <li class="hover-up">
                                        @php
                                            $shop_link = json_decode($shop->social_link);
                                        @endphp
                                        <a href="{{url($shop_link?->facebook)}}">
                                            <img src="{{asset('assets-front/imgs/theme/icons/social-tw.svg')}}"
                                                 alt=""/>
                                        </a>
                                    </li>
                                    <li class="hover-up">
                                        <a href="{{url($shop_link?->facebook)}}">
                                            <img src="{{asset('assets-front/imgs/theme/icons/social-fb.svg')}}"
                                                 alt=""/>
                                        </a>
                                    </li>
                                    <li class="hover-up">
                                        <a href="{{url($shop_link?->facebook)}}">
                                            <img src="{{asset('assets-front/imgs/theme/icons/social-insta.svg')}}" alt="" />
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="vendor-info">
                                <ul class="font-sm mb-20">
                                    @if($shop->address)
                                        <li><img class="mr-5" src="{{asset('assets-front/imgs/theme/icons/icon-location.svg')}}" alt="" /><strong>Address: </strong> <span>{{$shop->address?->city->name . '/' .$shop->address?->street . ',' .$shop->address?->building.','.$shop->address?->apartment}}</span></li>
                                    @endif
                                    <li><img class="mr-5" src="{{asset('assets-front/imgs/theme/icons/icon-contact.svg')}}" alt="" /><strong>Call Us:</strong><span>{{$shop->phone}}</span></li>
                                </ul>
                                <a href="#" class="btn btn-xs">Contact Seller <i class="fi-rs-arrow-small-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

</div>
