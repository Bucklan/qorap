<div>
    <main class="main">
        <div class="container mb-30 mt-50">
            <div class="row flex-row-reverse">
                <div class="col-lg-4-5">
                    <div class="shop-product-fillter">
                        <div class="totall-product">
                            <p>We found <strong class="text-brand">{{count($products)}}</strong> items for you!</p>
                        </div>

{{--                        sort by--}}

                        <div class="sort-by-product-area">
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
                                        <li><a class="active" href="#">Featured</a></li>
                                        <li><a href="#">Price: Low to High</a></li>
                                        <li><a href="#">Price: High to Low</a></li>
                                        <li><a href="#">Release Date</a></li>
                                        <li><a href="#">Avg. Rating</a></li>
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
                                                <img class="default-img" src="https://tailwindui.com/img/ecommerce-images/product-page-01-related-product-01.jpg" alt="" />
                                                <img class="hover-img" src="https://tailwindui.com/img/ecommerce-images/product-page-01-related-product-02.jpg" alt="" />
                                            </a>
                                        </div>
                                        {{--                                        <div class="product-action-1">--}}
                                        {{--                                            <a aria-label="Add To Wishlist" class="action-btn" href="#"><i class="fi-rs-heart"></i></a>--}}
                                        {{--                                            <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>--}}
                                        {{--                                        </div>--}}
                                    </div>
                                    <div class="product-content-wrap">
                                        <div class="product-category">
                                            <a href="#">CATEGORY NAME</a>
                                        </div>
                                        <h2><a href="#">{{$product->name}}</a></h2>
                                        <div class="product-rate-cover">
                                            <div class="product-rate d-inline-block">
                                                <div class="product-rating" style="width: 90%"></div>
                                            </div>
                                            <span class="font-small ml-5 text-muted"> (4.0)</span>
                                        </div>
                                        <div>
                                            <span class="font-small text-muted">By <a href="vendor-details-1.html">SHOP NAME</a></span>
                                        </div>
                                        <div class="product-card-bottom">
                                            <div class="product-price">
                                                <span>{{$product->price}} KZT</span>
                                                <span class="old-price">OLD PRICE</span>
                                            </div>
                                            <div class="add-cart">
                                                <a class="add" href="shop-cart.html"><i class="fi-rs-shopping-cart mr-5"></i>Add</a>
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
                        <h5 class="section-title style-1 mb-30">Category</h5>
                        <ul>
                            @foreach($categories as $value => $category)
                                @php
                                    $categoryName = json_decode($category->name, true)
                                @endphp
                                <li>
                                    <a wire:click.prevent="searchCategory({{$value}})"> <img src="#" alt="" />{{$categoryName['en']}}</a><span class="count">{{count($category->products)}}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- Fillter By Price -->
                    <div class="sidebar-widget price_range range mb-30">
                        <h5 class="section-title style-1 mb-30">Fill by price</h5>
                        <div class="price-filter">
                            <div class="price-filter-inner">
                                <div id="slider-range" class="mb-20"></div>
                                <div class="d-flex justify-content-between">
                                    <div class="caption">From: <strong id="slider-range-value1" class="text-brand"></strong></div>
                                    <div class="caption">To: <strong id="slider-range-value2" class="text-brand"></strong></div>
                                </div>
                            </div>
                        </div>
                        <div class="list-group">
                            <div class="list-group-item mb-10 mt-10">
                                <label class="fw-900">Color</label>
                                <div class="custome-checkbox">
                                    <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox1" value="" />
                                    <label class="form-check-label" for="exampleCheckbox1"><span>Red (56)</span></label>
                                    <br />
                                    <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox2" value="" />
                                    <label class="form-check-label" for="exampleCheckbox2"><span>Green (78)</span></label>
                                    <br />
                                    <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox3" value="" />
                                    <label class="form-check-label" for="exampleCheckbox3"><span>Blue (54)</span></label>
                                </div>
                                <label class="fw-900 mt-15">Item Condition</label>
                                <div class="custome-checkbox">
                                    <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox11" value="" />
                                    <label class="form-check-label" for="exampleCheckbox11"><span>New (1506)</span></label>
                                    <br />
                                    <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox21" value="" />
                                    <label class="form-check-label" for="exampleCheckbox21"><span>Refurbished (27)</span></label>
                                    <br />
                                    <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox31" value="" />
                                    <label class="form-check-label" for="exampleCheckbox31"><span>Used (45)</span></label>
                                </div>
                            </div>
                        </div>
                        <a href="shop-grid-right.html" class="btn btn-sm btn-default"><i class="fi-rs-filter mr-5"></i> Fillter</a>
                    </div>
                    </div>
            </div>
        </div>
    </main>

    <div class="mx-auto max-w-2xl px-4 py-4 sm:px-6 sm:py-12 lg:max-w-7xl lg:px-8 mt-4">
        @if(session('message'))
            <div id="{{$alertClass ? 'hidden' : ''}} alert-border-3" class="flex items-center p-4 mb-4 text-green-800 border-t-4 border-green-300 bg-green-50" role="alert">
                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                </svg>
                <div class="ms-3 text-sm font-medium">
                    {{session('message')}}
                </div>
                <button wire:click.prevent="addClass" class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8" >
                    <span class="sr-only">Dismiss</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                </button>
            </div>
       @endif
        <div class="space-y-6">
            <div class="flex justify-between">
                <div class="space-x-8">
                    <input wire:model.live="searchQuery"
                           type="search"
                           id="search"
                           placeholder="Search...">

{{--                    <select wire:model.live="searchCategory"--}}
{{--                            name="category">--}}
{{--                        <option value="0">--}}
{{--                            ----}}
{{--                            CHOOSE--}}
{{--                            CATEGORY--}}
{{--                            ----}}
{{--                        </option>--}}
{{--                        @foreach($categories as $value => $category)--}}
{{--                            @php--}}
{{--                                $categoryName = json_decode($category, true)--}}
{{--                            @endphp--}}
{{--                            <option value="{{$value}}">{{ $categoryName['en'] }}</option>--}}
{{--                        @endforeach--}}
{{--                    </select>--}}
                </div>
                @can(\App\Enums\User\Permission::PRODUCTS->value)
                    <a wire:navigate
                       href="{{ route('products.create') }}"
                       class="inline-flex items-center px-4 py-2 bg-gray-800 rounded-md font-semibold text-xs text-white uppercase tracking-widest">
                        Add
                        new
                        product
                    </a>
                @endcan
            </div>
        </div>
        <div class="text-green-600"
             wire:loading>
            Loading...
        </div>
        <div class="bg-white">
            <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
                <h2 class="text-2xl font-bold tracking-tight text-gray-900">
                    Products</h2>

                <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
                    @forelse($products as $product)
                        <div class="group relative {{$product->quantity ? '' : 'opacity-25'}}">
                            <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md bg-gray-200 lg:aspect-none group-hover:opacity-75 lg:h-80">
                                @if($product->getFirstMedia('products'))
                                    <img src="{{$product->getFirstMediaUrl('products')}}"
                                         alt="Front of men&#039;s Basic Tee in black."
                                         class="h-full w-full object-cover object-center lg:h-full lg:w-full">
                                @else
                                    <img src="https://tailwindui.com/img/ecommerce-images/product-page-01-related-product-01.jpg"
                                         alt="Front of men&#039;s Basic Tee in black."
                                         class="h-full w-full object-cover object-center lg:h-full lg:w-full">
                                @endif
                            </div>
                            <div class="mt-4 flex justify-between">
                                <div>
                                    <h3 class="text-sm text-gray-700">
                                        <a href="#">
                                            {{ $product->name }}
                                        </a>
                                    </h3>
                                        <p class="mt-3 text-sm text-gray-500">
                                            @foreach($product->categories as $category)
                                                @php
                                                    $categoryName = json_decode($category->name, true);
                                                @endphp
                                                <span class="mb-5 inline-flex items-center rounded-md bg-purple-50 px-2 py-1 text-xs font-medium text-purple-700 ring-1 ring-inset ring-purple-700/10">{{$categoryName['en']}}</span>
                                            @endforeach
                                        </p>

                                </div>
                                <p class="text-sm font-medium text-gray-900"> {{ $product->price }}
                                    KZT</p>
                            </div>
                            {{$product->quantity}}x
                            <a href="{{--{{ route('cart.store', $product->id) }}--}}"
                               class="inline-flex items-center px-4 py-2 bg-gray-800 rounded-md font-semibold text-xs text-white uppercase tracking-widest">
                                Add to cart </a>
                        </div>
                    @empty
                        <tr>
                            <td class="px-6 py-4 text-sm"
                                colspan="3">
                                No
                                products
                                were
                                found.
                            </td>
                        </tr>
                    @endforelse
                </div>
            </div>
        </div>
            {!! $products->links() !!}
    </div>
</div>
<script>

    let btn = document.querySelector('#dropdownDefault');

    btn.addEventListener("click", function(event) {
        event.preventDefault();
        let dropdown = document.querySelector('#dropdown');
        dropdown.classList.toggle('hidden');
    });
</script>

