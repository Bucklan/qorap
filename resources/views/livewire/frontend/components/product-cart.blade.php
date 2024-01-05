<div class="col-lg-1-5 col-md-4 col-12 col-sm-6 {{$product->quantity ?:'opacity-50'}}">
    <div class="product-cart-wrap mb-30">
        <div class="product-img-action-wrap">
            <div class="product-img product-img-zoom">
                <a href="#">
                    {{--                        https://tailwindui.com/img/ecommerce-images/product-page-01-related-product-01.jpg--}}
                    {{--                                 {{$product->getFirstMediaUrl('products')}}--}}
{{--                    <img class="default-img"--}}
{{--                         src="https://tailwindui.com/img/ecommerce-images/product-page-01-related-product-01.jpg"--}}
{{--                         alt=""/>--}}
{{--                    <img class="hover-img"--}}
{{--                         src="https://tailwindui.com/img/ecommerce-images/product-page-01-related-product-02.jpg"--}}
{{--                         alt=""/>--}}
                    <img class="default-img" src="{{$product->getFirstMediaUrl('products')}}">
                </a>
            </div>
            <div class="product-action-1">
                <a aria-label="Add To Wishlist"
                   class="action-btn"
                   href="#"><i
                            class="fi-rs-heart"></i></a>
                <a aria-label="Quick view"
                   href="{{route('products.show',$product->id)}}"
                   class="action-btn"><i
                            class="fi-rs-eye"></i></a>
            </div>
        </div>
        <div class="product-content-wrap">
            <div class="product-category">
                @foreach($product->categories as $value => $category)
                    <a href="#">{{$category->name}}</a>
                    {{$value < $product->categories_count - 1 ? ', ' : ''}}
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
                                                        href="#">{{$product->shop?->name}}</a></span>
            </div>
            <div class="product-card-bottom">
                <div class="product-price">
                    <h6>{{ $product->price}}
                        KZT</h6>
                    <span class="old-price">{{$product->old_price}} KZT</span>
                </div>
                <div class="add-cart">
                    <form action="{{route('cart.create')}}" method="post">
                        @method('POST')
                        @csrf
                        <input type="hidden" name="product_id" value="{{$product->id}}">
                        <input type="hidden" name="quantity" value="1">
                        <input type="hidden" name="price" value="{{$product->price}}">
                        <button class="add"><i
                                    class="fi-rs-shopping-cart mr-5"></i>Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
