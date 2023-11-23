
    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6 {{$product->quantity ?:'opacity-50'}}">
        <div class="product-cart-wrap mb-30">
            <div class="product-img-action-wrap">
                <div class="product-img product-img-zoom">
                    <a href="#">
                        {{--                                                @dump($product->getFirstMediaUrl('products'))--}}
                        @if($product->getFirstMedia('products'))
                            <img src="{{$product->getFirstMediaUrl('products')}}" alt="">
                        @else
                            <img class="default-img"
                                 src="https://tailwindui.com/img/ecommerce-images/product-page-01-related-product-01.jpg"
                                 alt=""/>
                            <img class="hover-img"
                                 src="https://tailwindui.com/img/ecommerce-images/product-page-01-related-product-02.jpg"
                                 alt=""/>
                        @endif
                    </a>
                </div>
                <div class="product-action-1">
                    <a aria-label="Add To Wishlist" class="action-btn" href="#"><i class="fi-rs-heart"></i></a>
                    <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                </div>
            </div>
            <div class="product-content-wrap">
                <div class="product-category">
                    @foreach($product->categories as $value => $category)
                        @php
                            $categoryName = json_decode($category->name, true)
                        @endphp
                        <a href="#">{{$categoryName['en']}}</a>
                        @if($value < count($product->categories) - 1)
                            ,
                        @endif
                    @endforeach

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
                        <h6>{{ $product->price}} KZT</h6>
                        <span class="old-price">{{$product->old_price}} KZT</span>
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
