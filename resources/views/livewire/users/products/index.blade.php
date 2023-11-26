
<div>

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
                    <div class="sidebar-widget widget-category-2 mb-30">
                        <h5 class="section-title style-1 mb-30">
                            Category</h5>
                        <div class="custome-checkbox mr-80" >
                            @foreach($categories as $category)
                                {{$category->id}}
                                <input class="form-check-input"
                                       type="checkbox"
                                       wire:model="searchCategory"
                                       id="category_{{ $category->id }}"
                                       value="{{ $category->id }}"
                                        {{ in_array($category->id, $searchCategory) ? 'checked' : '' }} />
                                <label class="form-check-label"
                                       for="category_{{ $category->id }}">
                                    <span>{{ $category->name }} ({{ count($category->products) }})</span>
                                </label>
                                <br/>
                                @endforeach
                        </div>
                    </div>
                    {{--                    <div class="sidebar-widget widget-category-2 mb-30">--}}
                    {{--                        <h5 class="section-title style-1 mb-30">--}}
                    {{--                            Color</h5>--}}
                    {{--                        <div class="custome-checkbox mr-80">--}}
                    {{--                            @foreach($categories as $value => $category)--}}
                    {{--                                @php--}}
                    {{--                                    $categoryName = json_decode($category->name, true)--}}
                    {{--                                @endphp--}}
                    {{--                                <input class="form-check-input" type="checkbox" wire:model.live="searchCategory" id="exampleCheckbox{{$value}}" value="{{$category->id}}" />--}}
                    {{--                                <label class="form-check-label" for="exampleCheckbox{{$value}}"><span>{{$categoryName['en']}} ({{count($category->products)}})</span></label>--}}
                    {{--                                <br />--}}
                    {{--                            @endforeach--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}

                    <!-- Fillter By Price -->
                    <div class="sidebar-widget price_range range mb-30">
                        <h5 class="section-title style-1 mb-30">
                            Fill
                            by
                            price</h5>
                        <div class="price-filter">
                            <div class="price-filter-inner row">
                                <div class="col-5">
                                    <input type="number"
                                           min="0"
                                           wire:model.live="fromPrice"
                                           placeholder="from">
                                </div>
                                <div class="col-1 mt-2">
                                    <strong>-</strong>
                                </div>
                                <div class="col-5">
                                    <input type="number"
                                           min="0"
                                           wire:model.live="toPrice"
                                           placeholder="to">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4-5">

                    <div class="shop-product-fillter">

                        <div class="totall-product">
                            <p>
                                We
                                found
                                <strong class="text-brand">{{count($products)}}</strong>
                                items
                                for
                                you!
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
                                        <span> {{$paginate?:'All'}} <i
                                                    class="fi-rs-angle-small-down"></i></span>
                                    </div>
                                </div>
                                <div class="sort-by-dropdown">
                                    <ul>
                                        @foreach($paginates as $paginate)
                                            <li>
                                                <a class="{{$paginate == $this->paginate ? 'active' : ''}}"
                                                   wire:click="LengthPagination({{$paginate}})">{{$paginate ?: 'All'}}</a>
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
                                            <a {{--wire:model="priceFilter"--}}>Price:
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
                    <div class="row product-grid"
                         wire:loading.class="opacity-50">
                        @foreach($products as $product)
                            <livewire:users.components.product-cart
                                    :$product
                                    wire:key="{{ $product->id}}"/>
                        @endforeach
                    </div>
{{--                    <livewire:users.components.paginate--}}
{{--                            :$collections="$products"--}}
{{--                            :$paginate--}}
{{--                            :$paginates="$paginates"--}}
{{--                            wire:key="paginate"/>--}}
                </div>
            </div>
            </div>
    </main>
</div>

