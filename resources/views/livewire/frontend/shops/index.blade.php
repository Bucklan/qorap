<div>
    <main class="main pages mb-80">
        {{ Breadcrumbs::render('shops.index') }}
        <div class="page-content pt-50">
            <div class="container">
                <div class="archive-header-2 text-center">
                    <h1 class="display-2 mb-50">Shops List</h1>
{{--                    search--}}
                    <div class="row">
                        <div class="col-lg-5 mx-auto">
                            <div class="sidebar-widget-2 widget_search mb-50">
                                <div class="search-form">
                                    <form action="#">
                                        <input type="text" placeholder="Search vendors (by name or ID)..." />
                                        <button type="submit"><i class="fi-rs-search"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
{{--                    endsearch--}}

                </div>
                <div class="row mb-50">
                    <div class="col-12 col-lg-8 mx-auto">
                        <div class="shop-product-fillter">


                            <livewire:frontend.components.total-product :total="$shops->total()" :items="'shops'">


                            <div class="sort-by-product-area">

{{--                                paginate show--}}
                                <div class="sort-by-cover mr-10">
                                    <div class="sort-by-product-wrap">
                                        <div class="sort-by">
                                            <span><i class="fi-rs-apps"></i>Show:</span>
                                        </div>
                                        <div class="sort-by-dropdown-wrap">
                                            <span> 50 <i class="fi-rs-angle-small-down"></i></span>
                                        </div>
                                    </div>
                                    <div class="sort-by-dropdown">
                                        <ul>
                                            <li><a class="active" href="#">50</a></li>
                                            <li><a href="#">100</a></li>
                                            <li><a href="#">150</a></li>
                                            <li><a href="#">200</a></li>
                                            <li><a href="#">All</a></li>
                                        </ul>
                                    </div>
                                </div>
{{--                                end--}}

{{--                            sort by--}}
                                <div class="sort-by-cover">
                                    <div class="sort-by-product-wrap">
                                        <div class="sort-by">
                                            <span><i class="fi-rs-apps-sort"></i>Sort by:</span>
                                        </div>
                                        <div class="sort-by-dropdown-wrap">
                                            <span> Featured <i class="fi-rs-angle-small-down"></i></span>
                                        </div>
                                    </div>
                                    <div class="sort-by-dropdown">
                                        <ul>
                                            <li><a class="active" href="#">Mall</a></li>
                                            <li><a href="#">Featured</a></li>
                                            <li><a href="#">Preferred</a></li>
                                            <li><a href="#">Total items</a></li>
                                            <li><a href="#">Avg. Rating</a></li>
                                        </ul>
                                    </div>
                                </div>
{{--                                end--}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row vendor-grid">

{{--                    foreach--}}
                    @forelse($shops as $shop)
                        <div class="col-lg-6 col-md-6 col-12 col-sm-6 {{$shop->products_count ?: 'opacity-50'}}">
                            <div class="vendor-wrap style-2 mb-40">
                                <div class="product-badges product-badges-position product-badges-mrg">
                                    <span class="{{$shop->getStatusClass()}}">{{$shop->status}}</span>
                                </div>
                                <div class="vendor-img-action-wrap">
                                    <div class="vendor-img">
                                        <a href="#">
                                            <img class="default-img" src="https://tailwindui.com/img/ecommerce-images/product-page-01-related-product-01.jpg" alt="" />
                                        </a>
                                    </div>
                                    <div class="mt-10 text-center">
                                        <span class="font-small total-product">{{$shop->products_count ? $shop->products_count .' products': 'no product'}}</span>
                                    </div>
                                </div>
                                <div class="vendor-content-wrap">
                                    <div class="mb-30">
                                        <div class="product-category">
                                            <span class="text-muted">Since 2012</span>
                                        </div>
                                        <h4 class="mb-5"><a href="#">{{$shop->name}}</a></h4>
                                        <div class="product-rate-cover">
                                            <div class="product-rate d-inline-block">
                                                <div class="product-rating" style="width: 90%"></div>
                                            </div>
                                            <span class="font-small ml-5 text-muted"> (4.0)</span>
                                        </div>
                                        <div class="vendor-info d-flex justify-content-between align-items-end mt-30">
                                            <ul class="contact-infor text-muted">
                                                @isset($shop->address_id)
                                                <li><img src="assets-front/imgs/theme/icons/icon-location.svg" alt="" /><strong>Address: </strong> <span>{{$shop->address?->city->name . '/' .$shop->address?->street . ',' .$shop->address?->building.','.$shop->address?->apartment}}</span></li>
                                                @else
                                                    <li><img src="assets-front/imgs/theme/icons/icon-location.svg" alt="" /><strong>Address: </strong> <span> Online fdsfsdfdsfdsfdsfdsfdsfs fdssssssssssssssssfdsfds fsdfdsfs</span></li>

                                                @endisset
                                                <li><img src="assets-front/imgs/theme/icons/icon-contact.svg" alt="" /><strong>Call Us:</strong><span>{{$shop->phone}}</span></li>
                                            </ul>
                                            <a href="{{route('shops.show',$shop->id)}}" class="btn btn-xs">Visit Store <i class="fi-rs-arrow-small-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @empty
                        <div class="col-lg-12 text-center mt-100">
                            <div class="section-title">
                                <h2 class="title">No Shop Found</h2>
                            </div>
                        </div>
                    @endforelse
{{--                    end--}}
                    <!--end vendor card-->
                </div>

{{--                paginate--}}
                <div class="pagination-area mt-20 mb-20">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-start">
                            <li class="page-item">
                                <a class="page-link" href="#"><i class="fi-rs-arrow-small-left"></i></a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item active"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link dot" href="#">...</a></li>
                            <li class="page-item"><a class="page-link" href="#">6</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#"><i class="fi-rs-arrow-small-right"></i></a>
                            </li>
                        </ul>
                    </nav>
                </div>
{{--                end--}}
            </div>
        </div>
    </main>

</div>