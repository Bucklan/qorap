@extends('layouts.app3')

@section('title','DETAILS PAGE')
@section('content')
    <div class="page-content">
        <div class="holder">
            <div class="container js-prd-gallery" id="prdGallery">
                <div class="row prd-block prd-block--prv-bottom prd-block--prv-double">
                    <div class="col-md-8 col-lg-8 aside--sticky js-sticky-collision">
                        <div class="aside-content">
                            <!-- Product Gallery -->
                            <div class="mb-2 js-prd-m-holder"></div>
{{--                            <div class="prd-block_main-image">--}}
{{--                                <div class="prd-block_main-image-holder" id="prdMainImage">--}}
{{--                                    <div class="product-main-carousel js-product-main-carousel" data-zoom-position="inner">--}}
                                        <!--                                    CAROUSEL PHOTO-->
                                        <div data-value="Beige"><span class="prd-img"><img
                                                    src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                    data-src="{{asset($gift->image)}}"
                                                    class="lazyload fade-up elzoom" alt=""
                                                    data-zoom-image="{{asset($gift->image)}}"/></span>
                                        </div>
                                        <!--                                    ENDCAROUSEL PHOTO-->

{{--                                    </div>--}}
                                    <!--                               IFNOTEMPTYSALE-->
                                    <!--                                <div class="prd-block_label-sale-squared justify-content-center align-items-center">-->
                                    <!--                                    <span>Sale</span></div>-->
                                    <!--                               ENDIFNOTEMPTYSALE-->
{{--                                </div>--}}
{{--                                <div class="prd-block_main-image-links">--}}
{{--                                    <a href="#" class="prd-block_zoom-link"><i--}}
{{--                                            class="icon-zoom-in"></i></a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="product-previews-wrapper">--}}
{{--                                <div class="product-previews-carousel js-product-previews-carousel" data-desktop="5"--}}
{{--                                     data-tablet="3">--}}
{{--                                    <a href="#" data-value="Beige"><span class="prd-img"><img--}}
{{--                                                src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="--}}
{{--                                                data-src="{{asset('/storage/images/gifts/'.$gift->image)}}"--}}
{{--                                                class="lazyload fade-up" alt=""/></span></a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <!-- /Product Gallery -->
                        </div>
                    </div>
                    <div class="col-md-10 col-lg-10 mt-1 mt-md-0">
                        <div class="prd-block_info prd-block_info--style1"
                             data-prd-handle="/products/copy-of-suede-leather-mini-skirt">
                            <div class="prd-block_info-top prd-block_info_item order-0 order-md-2">
                                <div class="prd-block_price prd-block_price--style2">
                                    <div class="prd-block_price--actual">{{$gift->price}} KZT</div>
                                    <div class="prd-block_price-old-wrap">
{{--                                        <span class="prd-block_price--old">$210.00</span>--}}
{{--                                        <span class="prd-block_price--text">You Save: $131.99 (28%)</span>--}}
                                    </div>
                                </div>
                            </div>
                            @if($avg != 0)
                            <div class="prd-holder prd-block_info_item order-0 mt-15 mt-md-0">
                                <div class="prd-block_title-wrap">
                                    <div class="prd-block_reviews" data-toggle="tooltip" data-placement="top"
                                         title="Scroll To Reviews">
                                        @for($i=0;$i<$avg;$i++)
                                        <i class="icon-star-fill fill"></i>
                                        @endfor
                                            @for($i = 5;$i>$avg;$i--)
                                                <i class="icon-star-review"></i>
                                            @endfor
                                        <span class="reviews-link"><a href="#"
                                                                      class="js-reviews-link"> ({{$avg}})</a></span>
                                    </div>
                                    <h1 class="prd-block_title">{{$gift->{'name_'.app()->getLocale()} }}</h1>
                                </div>
                            </div>
                            @endif
                            <div class="prd-block_description prd-block_info_item ">
                                <h3>{{__('show.Short description')}}</h3>
                                <p>{{$gift->{'content_'.app()->getLocale()} }}</p>
                                <div class="mt-1"></div>
{{--                                <div class="row vert-margin-less">--}}
{{--                                    <div class="col-sm">--}}
{{--                                        <ul class="list-marker">--}}
{{--                                            <li>100% Polyester</li>--}}
{{--                                            <li>Lining:100% Viscose</li>--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                            </div>
                            <div class="prd-block_info-box prd-block_info_item">
{{--                                <div class="two-column"><p>Availability:--}}
{{--                                        <span class="prd-in-stock" data-stock-status="">In stock</span></p>--}}
{{--                                    <p class="prd-taxes">Tax Info:--}}
{{--                                        <span>Tax included.</span>--}}
{{--                                    </p>--}}
                                    <p>{{__('messages.category')}}: <span> <a href="#" data-toggle="tooltip"
                                                             data-placement="top"
                                                             data-original-title="View all">{{$gift->category->{'name_'.app()->getLocale()} }}  </a></span></p>
{{--                                    <p>Sku: <span data-sku="">FOXic-45812</span></p>--}}
                                    <p> {{__('show.company')}}: <span>{{$gift->user->partner->name_company}}</span></p>
{{--                                    <p>Barcode: <span>314363563</span></p></div>--}}
                            </div>
                            <div class="order-0 order-md-100">
                                <div class="prd-block_options">
                                    @auth
                                        <form action="{{route('gifts.rate',$gift->id)}}" method="post">
                                            @csrf
                                            <select name="rating">
                                                @for($i=0;$i<=5;$i++)
                                                    <option
                                                        {{ $myRating==$i ? 'selected' : ''}} value="{{$i}}">{{ $i==0 ? __('messages.not rated'):$i}}</option>

                                                @endfor
                                            </select>
                                            <button class="btn" style="background-color: green">{{__('buttons.send')}}</button>
                                        </form>
                                        <form action="{{route('gifts.unrate',$gift->id)}}" method="post">
                                            @csrf
                                            <button class="btn" style="background-color: gray" title="{{__('buttons.clear')}}"><i class="icon-close"></i></button>
                                        </form>
                                        @if($like)
                                            <form action="{{route('gifts.like',$gift->id)}}" method="post">
                                                @csrf
                                                <input type="hidden" name="like" value="false">
                                                <button type="submit" class="btn btn-secondary-soft " style="background-color: red;color: white" title="{{__('buttons.add to playlist')}}">
                                                    <i class="icon-heart-hover"></i>
                                                </button>
                                            </form>
                                        @else
                                            <form action="{{route('gifts.like',$gift->id)}}" method="post">
                                                @csrf
                                                <input type="hidden" name="like" value="true">
                                                <button type="submit" class="btn btn-secondary-soft" style="background-color: red;color: white" title="{{__('buttons.add to playlist')}}">
                                                    <i class="icon-heart-stroke"></i>
                                                </button>
                                            </form>
                                        @endif
                                        @endauth
                                </div>
                                <div class="btn-wishlist-wrap">

                                    {{--                                            <a href="#"--}}
                                    {{--                                               class="btn-add-to-wishlist ml-auto btn-add-to-wishlist--add js-add-wishlist"--}}
                                    {{--                                               title="Add To Wishlist"><i class="icon-heart-stroke"></i></a>--}}
                                    {{--                                            <a href="#"--}}
                                    {{--                                               class="btn-add-to-wishlist ml-auto btn-add-to-wishlist--off js-remove-wishlist"--}}
                                    {{--                                               title="Remove From Wishlist"><i class="icon-heart-hover"></i></a>--}}
                                </div>
                                <form action="{{route('cart.puttocart',$gift->id)}}" method="post">
                                    @csrf
                                    <div class="prd-block_actions prd-block_actions--wishlist">
                                        <div class="btn-wrap">
                                            <button class="btn btn--add-to-cart js-trigger-addtocart js-prd-addtocart">
                                                {{__('buttons.addtocart')}}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="holder prd-block_links-wrap-bg d-none d-md-block">
            <div class="prd-block_links-wrap prd-block_info_item container mt-2 mt-md-5 py-1">
                <div class="prd-block_link"><span><i class="icon-call-center"></i>{{__('show.24/7')}}</span></div>
                <div class="prd-block_link">
                    <span>{{__('show.discount')}}</span></div>
                <div class="prd-block_link"><span><i class="icon-delivery-truck"></i> {{__('show.Fast Shipping')}}</span></div>
            </div>
        </div>
        <div class="holder mt-2 mt-md-5">
            <div class="container">
                <div class="panel-group panel-group--style1 prd-block_accordion" id="productAccordion">
                    <div class="panel">
                        <div class="panel-heading active">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#productAccordion" href="#collapse2">
                                    {{__('show.description')}}</a>
                                <span class="toggle-arrow"><span></span><span></span></span>
                            </h4>
                        </div>
                        <div id="collapse2" class="panel-collapse collapse show">
                            <div class="panel-body">
                                <h4>{{__('show.Give you a complete account of the system')}}</h4>
                                <p>{{$gift->{'content_'.app()->getLocale()} }}</p>
                            </div>
                        </div>
                    </div> @can('create',App\Models\Comment::class)
                    <div class="panel">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#productAccordion" href="#collapse4">
                                    {{__('show.Leave a review')}}</a>
                                <span class="toggle-arrow"><span></span><span></span></span>
                            </h4>
                        </div>
                        <div id="collapse4" class="panel-collapse collapse">
                            <div class="panel-body">
                                <div class="mt-3"></div>
                                <h3>{{__('show.Add your review')}}</h3>

                                <form action="{{route('comments.store')}}" method="post">
                                    @csrf
                                    <input type="hidden" value="{{$gift->id}}" name="gift_id">

                                    <label>review<span class="required">*</span></label>
                                    <input class="form-control form-control--sm" name="text" placeholder="{{__('show.enter your reviews')}}">
                                    <button class="btn btn--md">{{__('show.Submit Review')}}</button>
                                </form>

                            </div>
                        </div>
                    </div>
                    @endcan
                    <div class="panel">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#productAccordion" href="#collapse5">{{__('show.Reviews')}}</a>
                                <span class="toggle-arrow"><span></span><span></span></span>
                            </h4>
                        </div>
                        <div id="collapse5" class="panel-collapse collapse">
                            <div class="panel-body">
                                <div id="productReviews">
                                    <div class="row mb-2 align-items-center">
                                        <div class="col-sm"><h3 class="m-0">{{__('show.CUSTOMER REVIEWS')}}</h3></div>
                                        <div class="col-sm-auto ml-auto"><a href="#" class="review-write-link"><i
                                                    class="icon-pencil"></i>{{__('show.Write review')}}</a></div>
                                    </div>
                                    @isset($gift->comments)
                                        @foreach($gift->comments as $com)
                                    <div class="review-item">
                                        <div class="row align-items-center">
                                            <div class="col"><h5 class="review-item_author">@if($com->created_at->hour<10)0{{$com->created_at->hour}}@else{{$com->created_at->hour}}@endif:@if($com->created_at->minute<10)0{{$com->created_at->minute}}@else{{$com->created_at->minute}}@endif,
                                                {{$com->created_at->year}}</h5>
                                            </div>
                                        </div>
                                        <div class="review-item_content">
                                            <h4>{{$com->user->name}} @if($com->user->partner) {{$com->user->partner->company_name}} @endif</h4>
                                            <p>{{$com->text}}</p>
                                        </div>
                                    </div>
                                            <hr>
                                        @endforeach
                                    @endisset
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
