<div>
    @dump($toPrice)
    <main class="main">
        <!-- this div need center-->
        <div class="py-4 flex-column ">
            <div class="col-sm-7 justify-content-center">
                <input wire:model.live="searchQuery"
                       type="search"
                       id="search"
                       placeholder="Search...">
            </div>
        </div>
        <div class="container mb-30">
            <div class="row flex-row-reverse">
                <div class="col-lg-4-5">
                    <div class="shop-product-fillter">
                        <div class="totall-product">
                            <p>
                                We found<strong class="text-brand">{{count($products)}}</strong>items for you!
                            </p>
                        </div>

                        {{--                        sort by--}}

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

                        {{--                        end--}}
                    </div>
                    <div class="row product-grid">
                        @foreach($products as $product)
                            <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                                <div class="product-cart-wrap mb-30">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            <a href="#">
                                                <img class="default-img"
                                                     src="https://tailwindui.com/img/ecommerce-images/product-page-01-related-product-01.jpg"
                                                     alt=""/>
                                                <img class="hover-img"
                                                     src="https://tailwindui.com/img/ecommerce-images/product-page-01-related-product-02.jpg"
                                                     alt=""/>
                                            </a>
                                        </div>
                                                                                <div class="product-action-1">
                                                                                    <a aria-label="Add To Wishlist" class="action-btn" href="#"><i class="fi-rs-heart"></i></a>
                                                                                    <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                                                                </div>
                                    </div>
                                    <div class="product-content-wrap">
                                        <div class="product-category">
                                            <a href="#">CATEGORY
                                                NAME</a>
                                        </div>
                                        <h2>
                                            <a href="#">{{$product->name}}</a>
                                        </h2>
                                        <div class="product-rate-cover">
                                            <div class="product-rate d-inline-block">
                                                <div class="product-rating"
                                                     style="width: 90%"></div>
                                            </div>
                                            <span class="font-small ml-5 text-muted"> (4.0)</span>
                                        </div>
                                        <div>
                                            <span class="font-small text-muted">By <a
                                                        href="vendor-details-1.html">SHOP NAME</a></span>
                                        </div>
                                        <div class="product-card-bottom">
                                            <div class="product-price">
                                                <span>{{$product->price}} KZT</span>
                                                <span class="old-price">OLD PRICE</span>
                                            </div>
                                            <div class="add-cart">
                                                <a class="add"
                                                   href="shop-cart.html"><i
                                                            class="fi-rs-shopping-cart mr-5"></i>Add</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!--product grid-->
                    {{ $products->links() }}
                </div>
                <div class="col-lg-1-5 primary-sidebar sticky-sidebar">
                    <div class="sidebar-widget widget-category-2 mb-30">
                        <h5 class="section-title style-1 mb-30">
                            Category</h5>
                        <div class="custome-checkbox mr-80">
                            @foreach($categories as $value => $category)
                                @php
                                    $categoryName = json_decode($category->name, true)
                                @endphp
                            <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox{{$value}}" value="" />
                            <label class="form-check-label" for="exampleCheckbox{{$value}}"><span>{{$categoryName['en']}} ({{count($category->products)}})</span></label>
                            <br />
                            @endforeach
                        </div>
                    </div>
                    <div class="sidebar-widget widget-category-2 mb-30">
                        <h5 class="section-title style-1 mb-30">
                            Color</h5>
                        <div class="custome-checkbox mr-80">
                            @foreach($categories as $value => $category)
                                @php
                                    $categoryName = json_decode($category->name, true)
                                @endphp
                                <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox{{$value}}" value="" />
                                <label class="form-check-label" for="exampleCheckbox{{$value}}"><span>{{$categoryName['en']}} ({{count($category->products)}})</span></label>
                                <br />
                            @endforeach
                        </div>
                    </div>

                    <!-- Fillter By Price -->
                    <div class="sidebar-widget price_range range mb-30">
                        <h5 class="section-title style-1 mb-30">
                            Fill
                            by
                            price</h5>
                        <div class="price-filter">
                            <div class="price-filter-inner row">
                                <div class="col-5">
                                    <input type="number" wire:model.live="fromPrice" placeholder="from">
                                </div>
                                <div class="col-1 mt-2">
                                    <strong>-</strong>
                                </div>
                                <div class="col-5">
                                    <input type="number" wire:model.live="toPrice" placeholder="to">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
    </main>
</div>
{{--<script>--}}

{{--    let btn = document.querySelector('#dropdownDefault');--}}

{{--    btn.addEventListener("click", function(event) {--}}
{{--        event.preventDefault();--}}
{{--        let dropdown = document.querySelector('#dropdown');--}}
{{--        dropdown.classList.toggle('hidden');--}}
{{--    });--}}
{{--</script>--}}

