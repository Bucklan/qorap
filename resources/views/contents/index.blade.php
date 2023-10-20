@extends('layouts.app3')
@section('content')
    <style>
        #holderCollectionGrid .collection-grid-2-title {
            font-size: 16px;
            font-weight: 600;
            color: #464b5c
        }
        #holderCollectionGrid .collection-grid-2-title:hover {
            color: #464b5c
        }
    </style>
    <div class="page-content">
        <div id="shopify-section-1586608150816" class="shopify-section index-section index-section--flush">
            <div class="holder fullwidth fullboxed mt-0 full-nopad">
                <div class="container">
                    <div class="bnslider-wrapper">
                        <div class="bnslider keep-scale" data-start-width='1920' data-start-height='785'
                             data-start-mwidth='414' data-start-mheight='736' id="bnslider-1586608150816"
                             data-autoplay="true" data-speed="5000">
                            <a href="#" target="_self" class="bnslider-slide ">
                                <div class="bnslider-image-mobile lazyload fade-up-fast"
                                     data-bgset="images/skins/electronics/slider/double-glow-christmas-414x736-wallpaper.jpg"
                                     data-sizes="auto"></div>
                                <div class="bnslider-image lazyload fade-up-fast"
                                     data-bgset="images/skins/electronics/slider/slide-electronics-03.webp"
                                     data-sizes="auto"></div>
                                <div class="bnslider-text-wrap bnslider-overlay container">
                                    <div class="bnslider-text-content txt-middle txt-left txt-middle-m txt-center-m">
                                        <div class="bnslider-text-content-flex  container ">
                                            <div class="bnslider-vert w-s-60 w-ms-80 p-0">
                                                <div class="bnslider-text order-2 mt-sm bnslider-text--xl text-center"
                                                     data-animation="fadeInUp" data-animation-delay="800"
                                                     data-fontcolor="#363b4b" data-bgcolor="" data-fontweight="600"
                                                     data-fontline="1.00" data-otherstyle="">{{__('messages.Gifts')}}
                                                </div>
                                                <div class="bnslider-text order-3 mt-sm bnslider-text--sm text-center"
                                                     data-animation="zoomIn" data-animation-delay="1000"
                                                     data-fontcolor="#ffffff" data-bgcolor="" data-fontweight="500"
                                                     data-fontline="1.5" data-otherstyle="">
                                                </div>
                                                <div
                                                    class="bnslider-text order-1 mt-0 bnslider-text--md text-center text-danger"
                                                    data-animation="fadeInDown" data-animation-delay="1600"
                                                    data-fontcolor="#5378f4" data-bgcolor="" data-fontweight="600"
                                                    data-fontline="1.00"
                                                    data-otherstyle="">{{__('buttons.SALE up to 70%')}}
                                                </div>
                                                <div class="btn-wrap text-center  order-4 mt-md"
                                                     data-animation="fadeInUp"
                                                     data-animation-delay="2000">
                                                    <div class="btn btn--lg">{{__('buttons.shop now')}}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                                                        <a href="#" target="_self" class="bnslider-slide ">
                                                            <div class="bnslider-image-mobile lazyload fade-up-fast"
                                                                 data-bgset="images/skins/electronics/slider/slide-electronics-03.webp"
                                                                 data-sizes="auto"></div>
                                                            <div class="bnslider-image lazyload fade-up-fast"
                                                                 data-bgset="images/skins/electronics/slider/slide-electronics-03.webp"
                                                                 data-sizes="auto"></div>
                                                            <div class="bnslider-text-wrap bnslider-overlay container">
                                                            </div>
                                                        </a>
                        </div>
                        <div class="bnslider-loader"></div>
                        <div class="bnslider-arrows d-sm-none container">
                            <div></div>
                        </div>
                        <div class="bnslider-dots d-none d-sm-block container"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
{{--    3STEP--}}
    <div class="holder">
        <div class="container">
            <div class="title-wrap text-center">
                <h2 class="h1-style">{{__('home.WHY SHOP WITH US?')}}</h2>
            </div>
            <div class="text-icn-blocks-row">
                <div class="text-icn-block">
                    <div class="icn">
                        <i class="icon-shopping-1"></i>
                    </div>
                    <div class="text">
                        {{__('home.Complete buyer supply store')}}
                    </div>
                </div>
                <div class="text-icn-block">
                    <div class="icn">
                        <i class="icon-box-1"></i>
                    </div>
                    <div class="text">
                        {{__('home.Same day dispatch on all orders')}}
                    </div>
                </div>
                <div class="text-icn-block">
                    <div class="icn">
                        <i class="icon-delivery-truck"></i>
                    </div>
                    <div class="text">
                        {{__('home.Free delivery available on all orders')}}
                    </div>
                </div>
                <div class="text-icn-block">
                    <div class="icn">
                        <i class="icon-call-center"></i>
                    </div>
                    <div class="text">
                        {{__('home.Professional advice and great support')}}
                    </div>
                </div>
                <div class="text-icn-block d-none d-sm-block">
                    <div class="icn">
                        <i class="icon-tag"></i>
                    </div>
                    <div class="text">
                        {{__('home.Fall and Winter savings are in the air')}}
                    </div>
                </div>
            </div>
        </div>
    </div>
{{--    CATEGORIES--}}
    <div class="holder holder-mt-small" id="holderCollectionGrid">
        <div class="container">
            <div class="collection-grid-2 row justify-content-center">
                @foreach($categories as $category)
                <div class="collection-grid-2-item col-9 col-md-quarter col-lg-3">
                    <a href="{{route('gift.category',$category->id)}}" target="_self" class="bnr-wrap collection-grid-2-item-inside">
                        <div class="collection-grid-2-img image-container image-hover-scale" style="padding-bottom: 77.778%"><img class="lazyload fade-up" data-src="{{asset($category->image)}}" data-sizes="auto" alt="Office equipment"></div>
                        <h3 class="collection-grid-2-title pb-15 heading-font">{{$category->{'name_'.app()->getLocale()} }}</h3>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>

{{--PRODUCTS--}}


    <div class="holder">
        <div class="container">
            <div class="title-wrap title-md">
                <h2 class="h2-style">{{__('home.NEW ARRIVALS')}}</h2>
            </div>
            <div class="prd-grid-wrap position-relative">
                <div class="prd-grid data-to-show-3 data-to-show-lg-3 data-to-show-md-2 data-to-show-sm-2 data-to-show-xs-2 js-category-grid">
                    @foreach($gifts as $gift)
                    <div class="prd prd-hor ">
                        <div class="prd-inside">
                            <div class="prd-img-area">
                                <a href="{{route('gift.show',$gift->id)}}" class="prd-img image-hover-scale image-container">
                                    <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="{{asset($gift->image)}}" class="js-prd-img lazyload">
                                    <div class="foxic-loader"></div>
                                    <div class="prd-big-circle-labels">
                                        <div class="label-new"><span>{{__('home.New')}}</span></div>
                                    </div>
                                </a>
                                <div class="prd-circle-labels">
                                    <a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a>
                                    <a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a>
                                    <a href="{{route('gift.show',$gift->id)}}" class="circle-label-qview">
                                        <i class="icon-eye"></i><span>{{__('buttons.details')}}</span></a>
                                </div>

                            </div>
                            <div class="prd-info">
                                <div class="prd-info-wrap">
                                    <div class="prd-info-top">
                                        <div class="prd-rating">
                                            <i class="icon-star-fill fill">
                                            </i>
                                            <i class="icon-star-fill fill"></i>
                                            <i class="icon-star-fill fill"></i>
                                            <i class="icon-star-fill fill"></i>
                                            <i class="icon-star-fill fill"></i>
                                        </div>
                                    </div>
                                    <h2 class="prd-title"><a href="{{route('gift.show',$gift->id)}}">{{$gift->{'name_'.app()->getLocale()} }}</a></h2>
                                    <div class="prd-description">
                                        {{$gift->{'content_'.app()->getLocale()} }}
                                    </div>
                                </div>
                                <div class="prd-hovers">
                                    <div class="prd-circle-labels">
                                        <div><a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a></div>
                                        <div><a href="#" class="circle-label-qview prd-hide-mobile js-prd-quickview" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a></div>
                                    </div>
                                    <div class="prd-price">

                                        <div class="price-new">{{$gift->price }} KZT</div>
                                    </div>
                                    <div class="prd-action">

                                        <div class="prd-action-left">
                                            <form action="{{route('cart.puttocart',$gift->id)}}" method="post">
                                                @csrf
                                                <button class="btn js-prd-addtocart">
                                                    {{__('buttons.addtocart')}}
                                                </button>
                                            </form>
                                        </div>
                                        <div class="prd-action-right">
                                            <div class="prd-action-right-inside">
                                                <div class="prd-tag"><a href="#">{{$gift->user->partner->name_company}}</a></div>
                                                <div class="prd-rating"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    </div>
                </div>
            </div>
        </div>


{{--PARTNERS--}}
    <div class="holder holder-mt-medium">
        <div class="container">
            <div class="title-wrap text-left">
                <h2 class="h2-style">{{__('home.OUR PARTNERS')}}</h2>
            </div>
            <ul class="brand-carousel js-brand-carousel slick-arrows-aside-simple" data-slick='{"slidesToShow": 5,  "responsive": [{"breakpoint": 992,"settings": {"slidesToShow": 4 }},{"breakpoint": 480,"settings": {"slidesToShow": 2 }}]}'>
{{--                @foreach($partners as $partner)--}}
{{--                <li>--}}
{{--                    <div>--}}
{{--                        <img class="lazyload lazypreload" data-src="{{$partner->image}}" data-sizes="auto" alt="Brand">--}}
{{--                    </div>--}}
{{--                </li>--}}
{{--                @endforeach--}}
            </ul>
        </div>
    </div>

@endsection
