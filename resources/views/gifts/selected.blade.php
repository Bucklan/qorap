@extends('layouts.app3')

@section('title','MAIN PAGE')

@section('content')
    <div class="holder">
        <div class="container">
            <!-- Two columns -->
            <!-- Page Title -->
            @isset($selecteds)
                <div class="page-title text-center">
                    <h1>{{__('footer.mywishlist')}}</h1>
                </div>
                <!-- /Page Title -->
                <div class="row">
                    <!-- Center column -->
                    <div class="col-lg aside">
                        <div class="prd-grid-wrap">
                            <!-- Products Grid -->
                            <div class="prd-grid
                        product-listing data-to-show-4
                        data-to-show-md-3 data-to-show-sm-2 js-category-grid"
                                 data-grid-tab-content>
                                @foreach($selecteds as $selectedGift)
                                    <div class="prd prd--style2 prd-labels--max prd-labels-shadow ">
                                        <div class="prd-inside">
                                            <div class="prd-img-area">
                                                <a href="{{route('gift.show',$selectedGift->id)}}"
                                                   class="prd-img image-hover-scale image-container">
                                                    <img
                                                        src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                        data-src="{{asset($selectedGift->image)}}"

                                                        alt="Oversized Cotton Blouse"
                                                        class="js-prd-img lazyload fade-up">
                                                    <div class="foxic-loader"></div>
                                                    <div class="prd-big-squared-labels">
                                                        {{--EGER NEW TAUAR BOLSA--}}
                                                        {{--                                                <div class="label-new"><span>New</span></div>--}}
                                                        {{--ENDNEWGIFT--}}

                                                        {{--                                                EGER SALE BOLSA--}}
                                                        {{--                                                <div class="label-sale"><span>-10% <span--}}
                                                        {{--                                                            class="sale-text">Sale</span></span>--}}

                                                        {{--                                                    <div class="countdown-circle">--}}
                                                        {{--                                                        <div class="countdown js-countdown"--}}
                                                        {{--                                                             data-countdown="2021/07/01"></div>--}}
                                                        {{--                                                    </div>--}}

                                                        {{--                                                </div>--}}
                                                        {{--                                                ENDSALEGIFT--}}

                                                    </div>
                                                </a>
                                                <div class="prd-circle-labels">
                                                    {{--                                            HEARTICON--}}
                                                        <form action="{{route('gifts.like',$selectedGift->id)}}" method="post">
                                                            @csrf
                                                            <input type="hidden" name="like" value="false">
                                                            <button style="border-color: white" title="{{__('buttons.remove to playlist')}}">
                                                                <i class="icon-heart-hover"></i>
                                                            </button>
                                                        </form>
                                                    {{--                                            ENDBLACKHEART--}}
                                                    {{--                                            DETAILS--}}
                                                    <a href="{{route('gift.show',$selectedGift->id)}}"
                                                       class="circle-label-qview">
                                                        <i class="icon-eye"></i><span>{{__('buttons.details')}}</span></a>
                                                    {{--                                            ENDDETAILS--}}

                                                </div>

                                                <ul class="list-options color-swatch">
                                                    <li data-image="{{asset($selectedGift->image)}}"
                                                        class="active">
                                                        <a href="#" class="js-color-toggle" data-toggle="tooltip"
                                                           data-placement="right" title="{{$selectedGift->name}}">
                                                            <img src="{{asset($selectedGift->image)}}"
                                                                 data-src="{{asset($selectedGift->image)}}"
                                                                 class="lazyload fade-up" alt="Color Name">
                                                        </a>
                                                    </li>
                                                    {{--                                            <li data-image="images/skins/fashion/products/product-03-2.jpg">--}}
                                                    {{--                                                <a href="#" class="js-color-toggle" data-toggle="tooltip"--}}
                                                    {{--                                                   data-placement="right" title="Color Name">--}}
                                                    {{--                                                    <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="--}}
                                                    {{--                                                        data-src="images/skins/fashion/products/product-03-2.jpg"--}}
                                                    {{--                                                        class="lazyload fade-up" alt="Color Name">--}}
                                                    {{--                                                </a>--}}
                                                    {{--                                            </li>--}}
                                                    {{--                                            <li data-image="images/skins/fashion/products/product-03-3.jpg">--}}
                                                    {{--                                                <a href="#" class="js-color-toggle"--}}
                                                    {{--                                                   data-toggle="tooltip" data-placement="right"--}}
                                                    {{--                                                   title="Color Name">--}}
                                                    {{--                                                    <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="--}}
                                                    {{--                                                        data-src="images/skins/fashion/products/product-03-3.jpg"--}}
                                                    {{--                                                        class="lazyload fade-up" alt="Color Name">--}}
                                                    {{--                                                </a>--}}
                                                    {{--                                            </li>--}}
                                                </ul>
                                            </div>
                                            <div class="prd-info">
                                                <div class="prd-info-wrap">
                                                    {{--                                            <div class="prd-rating justify-content-center"><i--}}
                                                    {{--                                                    class="icon-star-fill fill"></i><i--}}
                                                    {{--                                                    class="icon-star-fill fill"></i><i--}}
                                                    {{--                                                    class="icon-star-fill fill"></i><i--}}
                                                    {{--                                                    class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i>--}}
                                                    {{--                                            </div>--}}
                                                    <div class="prd-tag">
                                                        <a href="#">{{$selectedGift->user->partner->name_company}}</a>
                                                    </div>
                                                    <h2 class="prd-title">
                                                        <a href="product.html">{{$selectedGift->name}}</a>
                                                    </h2>
                                                    {{--                                            BIGSITEVERSIONADDCARD--}}
                                                    <div class="prd-action">
                                                        <form action="{{route('cart.puttocart',$selectedGift->id)}}"
                                                              method="post">
                                                            @csrf
                                                            <button class="btn js-prd-addtocart">
                                                                {{__('buttons.addtocart')}}
                                                            </button>
                                                        </form>
                                                    </div>
                                                    {{--                                            ENDBIGSITEVERSIONADDCARD--}}
                                                </div>
                                                <div class="prd-hovers">
                                                    <div class="prd-circle-labels">
                                                        <div>
                                                            <a href="#"
                                                               class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0"
                                                               title="Add To Wishlist">
                                                                <i class="icon-heart-stroke"></i>
                                                            </a>
                                                            <a href="#"
                                                               class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0"
                                                               title="Remove From Wishlist">
                                                                <i class="icon-heart-hover"></i>
                                                            </a>
                                                        </div>
                                                        <div class="prd-hide-mobile">
                                                            <a href="#" class="circle-label-qview js-prd-quickview"
                                                               data-src="ajax/ajax-quickview.html">
                                                                <i class="icon-eye"></i>
                                                                <span>{{__('buttons.details')}}</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="prd-price">
                                                        <div class="price-old">{{$selectedGift->price+rand(0,25000)}} KZT</div>
                                                        <div class="price-new">{{$selectedGift->price}} KZT</div>
                                                    </div>
                                                    {{--                                            MOBILEVERSIONADDCARD--}}
                                                    <div class="prd-action">
                                                        <div class="prd-action-left">
                                                            <form action="{{route('cart.puttocart',$selectedGift->id)}}"
                                                                  method="post">
                                                                @csrf
                                                                <button class="btn js-prd-addtocart"
                                                                        data-product='{"name": "Oversized Cotton Blouse", "path":"images/skins/fashion/products/product-03-1.jpg", "url":"product.html", "aspect_ratio":0.778}'>
                                                                    {{__('buttons.addtocart')}}
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    {{--                                            ENDMOBILEVERSIONADDCARD--}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>

                        </div>
                    </div>
                    <!-- /Center column -->
                </div>

        @else
                <div class="holder mt-0">
                    <div class="container">
                        <div class="page404-bg">
                            <div class="page404-text">
                                <div class="minicart-empty-icon">
                                    <i class="icon-wishlist"></i>
                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 306 262"
                                         style="enable-background:new 0 0 306 262;" xml:space="preserve"><path class="st0"
                                                                                                               d="M78.1,59.5c0,0-37.3,22-26.7,85s59.7,237,142.7,283s193,56,313-84s21-206-69-240s-249.4-67-309-60C94.6,47.6,78.1,59.5,78.1,59.5z"/></svg>
                                </div>
                                <div class="txt2">{{__('profile.our selecteds is empty!')}}</div>
                            </div>
                        </div>
                    </div>
                </div>
        @endisset

        <!-- /Two columns -->
        </div>
    </div>
@endsection

