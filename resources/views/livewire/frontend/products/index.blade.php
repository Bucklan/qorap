
<div>
    {{ Breadcrumbs::render('products.index') }}
    <main class="main">
        <!-- this div need center-->

        <div class="container mb-30 mt-50">
            <div class="row flex-row-reverse">
                <div class="col-lg-1-5 primary-sidebar sticky-sidebar">
                    <div class="sidebar-widget-2 widget_search mb-50">
                        <div class="search-form">
                            <input type="search" wire:model.live="searchQuery" placeholder="Search…" />
                        </div>
                    </div>
{{--                    <livewire:frontend.components.filter-checkbox--}}
{{--                            :elements="$categories"--}}
{{--                            :search-element="$searchCategory"--}}
{{--                            :search-model='"searchCategory"'--}}
{{--                            :name-element="'Category'"--}}
{{--                    />--}}

{{--                    <livewire:frontend.components.filter-checkbox--}}
{{--                            :elements="$colors"--}}
{{--                            :search-element="$searchColor"--}}
{{--                            :search-model='"searchColor"'--}}
{{--                            :name-element="'Color'"--}}
{{--                    />--}}
{{--                    <livewire:frontend.components.filter-checkbox--}}
{{--                            :elements="$shops"--}}
{{--                            :search-element="$searchShop"--}}
{{--                            :search-model='"searchShop"'--}}
{{--                            :name-element="'Shop'"--}}
{{--                    />--}}
                    <!-- Fillter By Price -->
{{--                   <livewire:frontend.components.price-filter />--}}
                </div>
                <div class="col-lg-4-5">

                    <div class="shop-product-fillter">
                        <livewire:frontend.components.total-product :total="$products->total()" :items="'items'" />

                        {{--                        start--}}

                        <div class="sort-by-product-area">
                            <div class="sort-by-cover mr-10">
                                <div class="sort-by-product-wrap">
                                    <div class="sort-by">
                                        <span><i class="fi-rs-apps"></i>Show:</span>
                                    </div>
                                    <div class="sort-by-dropdown-wrap">
                                        <span> {{$paginate ?: 'no product'}} <i
                                                    class="fi-rs-angle-small-down"></i></span>
                                    </div>
                                </div>
                                <div class="sort-by-dropdown">
                                    <ul>
                                        @foreach($paginates as $paginate)
                                            <li>
                                                <a class="{{$paginate == $this->paginate ? 'active' : ''}}"
                                                   wire:click="LengthPagination({{$paginate}})">{{$paginate}}</a>
                                            </li>
                                        @endforeach
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
                                        <li><a {{--wire:model="priceFilter"--}}>Price: Low to High</a></li>
                                        <li><a href="#">Price: High to Low</a></li>
                                        <li><a href="#">Release Date</a></li>
                                        <li><a href="#">Avg. Rating</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        {{--                        end--}}
                    </div>
                    <div class="row product-grid" wire:loading.class="opacity-50">
                        @forelse($products as $product)
                            <livewire:frontend.components.product-cart
                                    :$product
                                    wire:key="{{ $product->id}}"/>
                        @empty
                            <div class="col-lg-12 text-center mt-100">
                                  <h2 class="hover-up ">Sorry! No Product Found<i class="fi fi-rs-person-dolly-empty"></i></h2>
                            </div>
                        @endforelse
                    </div>
                    {{$products->links()}}
                </div>
            </div>
            </div>
    </main>
</div>

