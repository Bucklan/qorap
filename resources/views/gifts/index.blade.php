@extends('layouts.app3')

@section('title','MAIN PAGE')

@section('content')
    <div class="holder">
        <div class="container">
            <!-- Two columns -->
            <!-- Page Title -->
            @empty($AllGifts)
                <div class="holder mt-0">
                    <div class="container">
                        <div class="page404-bg">
                            <div class="page404-text">
                                <div class="minicart-empty-icon">
                                    <i class="icon-gift"></i>
                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                         viewBox="0 0 306 262"
                                         style="enable-background:new 0 0 306 262;" xml:space="preserve"><path
                                            class="st0"
                                            d="M78.1,59.5c0,0-37.3,22-26.7,85s59.7,237,142.7,283s193,56,313-84s21-206-69-240s-249.4-67-309-60C94.6,47.6,78.1,59.5,78.1,59.5z"/></svg>
                                </div>
                                <div class="txt2">{{__('profile.our Gift is empty!')}}</div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="page-title text-center">
                    <h1>{{__('messages.Gifts')}}</h1>
                    <h5>{{count($AllGifts)}}x {{__('messages.Gifts')}}</h5>

                </div>
                <!-- /Page Title -->
                <div class="row">
                    <!-- Center column -->
                    <div class="col-lg aside">
                        <div class="prd-grid-wrap">
                            <!-- Products Grid -->
                            <form action="{{route('gifts.search')}}" method="GET">

                                <div class="row justify-content-center mb-5">
                                    <div class="col-sm-8">
                                        <label class="visually-hidden" for="autoSizingInputGroup">{{__('profile.from Price')}}</label>
                                        <div class="input-group">
                                            <input type="number" min="0" value="0" class="form-control" id="autoSizingInputGroup"
                                                   placeholder="{{__('profile.from Price')}}" name="from_price">
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <label class="visually-hidden" for="autoSizingInputGroup">{{__('profile.to Price')}}</label>
                                        <div class="input-group">
                                            <input type="number" min="0" class="form-control" id="autoSizingInputGroup"
                                                   placeholder="{{__('profile.to Price')}}" name="to_price">
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <label class="visually-hidden" for="autoSizingSelect">{{__('messages.category')}}</label>
                                        <select class="form-control" id="autoSizingSelect" name="category">
                                            @foreach($categories as $cat)
                                                <option value="{{$cat->id}}" class="active">{{$cat->{'name_'.app()->getLocale()} }}</option>

                                            @foreach($cat->categories as $c)
                                                    <option value="{{$c->id}}" >--{{$c->{'name_'.app()->getLocale()} }}</option>
                                                    @foreach($c->categories as $cs)
                                                        <option value="{{$cs->id}}">----{{$cs->{'name_'.app()->getLocale()} }}</option>
                                                    @endforeach
                                                @endforeach
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-8">
                                        <label class="visually-hidden" for="sort">{{__('profile.Sort')}}</label>
                                        <select class="form-control" id="sort" name="sortBy">
                                            <option value="1">{{__('profile.sort1')}}</option>
                                            <option value="2">{{__('profile.sort2')}}</option>
                                            <option value="3">{{__('profile.sort3')}}</option>
                                            <option value="4">{{__('profile.sort4')}}</option>
                                        </select>
                                    </div>
                                    <div class="col-auto mt-3">
                                        <button class="btn btn-success" title="{{__('buttons.search')}}"><i class="icon-search"></i></button>
                                    </div>
                                </div>
                            </form>
                            <div class="prd-grid
                        product-listing data-to-show-4
                        data-to-show-md-3 data-to-show-sm-2 js-category-grid"
                                 data-grid-tab-content>
                                @foreach($AllGifts as $gift)
                                    <div class="prd prd--style2 prd-labels--max prd-labels-shadow ">
                                        <div class="prd-inside">
                                            <div class="prd-img-area">
                                                <a href="{{route('gift.show',$gift->id)}}"
                                                   class="prd-img image-hover-scale image-container">
                                                    <img
                                                        src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                        data-src="{{asset($gift->image)}}"

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

{{--                                                    <a href="#"--}}
{{--                                                       class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0"--}}
{{--                                                       title="Add To Wishlist">--}}
{{--                                                        <i class="icon-heart-stroke"></i>--}}
{{--                                                    </a>--}}
                                                    {{--                                            ENDHEARTICON--}}
                                                    {{--                                            BLACKHEART--}}
{{--                                                    <a href="#"--}}
{{--                                                       class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0"--}}
{{--                                                       title="Remove From Wishlist">--}}
{{--                                                        <i class="icon-heart-hover"></i>--}}
{{--                                                    </a>--}}
                                                    {{--                                            ENDBLACKHEART--}}
                                                    {{--                                            DETAILS--}}
                                                    <a href="{{route('gift.show',$gift->id)}}"
                                                       class="circle-label-qview">
                                                        <i class="icon-eye"></i><span>{{__('buttons.details')}}</span></a>
                                                    {{--                                            ENDDETAILS--}}

                                                </div>

                                                <ul class="list-options color-swatch">
                                                    <li data-image="{{asset($gift->image)}}"
                                                        class="active">
                                                        <a href="#" class="js-color-toggle" data-toggle="tooltip"
                                                           data-placement="right" title="{{$gift->name}}">
                                                            <img src="{{asset($gift->image)}}"
                                                                 data-src="{{asset($gift->image)}}"
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
                                                        <a href="#">{{$gift->user->partner->name_company}}</a>
                                                    </div>
                                                    <h2 class="prd-title">
                                                        <a href="{{route('gift.show',$gift->id)}}">{{$gift->{'name_'.app()->getLocale()} }}</a>
                                                    </h2>
                                                    {{--                                            BIGSITEVERSIONADDCARD--}}
                                                    <div class="prd-action">
                                                        <form action="{{route('cart.puttocart',$gift->id)}}"
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
                                                                <span>QUICK VIEW</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="prd-price">
                                                        <div class="price-old">{{$gift->price+rand(0,25000)}} KZT</div>
                                                        <div class="price-new">{{$gift->price}} KZT</div>
                                                    </div>
                                                    {{--                                            MOBILEVERSIONADDCARD--}}
                                                    <div class="prd-action">
                                                        <div class="prd-action-left">
                                                            <form action="{{route('cart.puttocart',$gift->id)}}"
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
            @endempty
            <!-- /Two columns -->
        </div>
    </div>
@endsection

