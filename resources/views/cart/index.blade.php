@extends('layouts.app3')

@section('title','CART PAGE')

@section('content')
    <div class="page-content">
        <div class="holder breadcrumbs-wrap mt-0">
            <div class="container">
                <ul class="breadcrumbs">
                    <li><a href="{{url('/')}}">{{__('cart.Home')}}</a></li>
                    <li><span>{{__('cart.cart')}}</span></li>
                </ul>
            </div>
        </div>
        @isset($giftsInCart)
        <div class="holder">
            <div class="container">
                <div class="page-title text-center">
                    <h1>{{__('cart.Shopping Cart')}}</h1>
                </div>
                <div class="row">
                    <!--                SOLZHAQ-->
                    <div class="col-lg-11 col-xl-13">
                        <div class="cart-table">
                            <div class="cart-table-prd cart-table-prd--head py-1 d-none d-md-flex">
                                <div class="cart-table-prd-image text-center">
                                    {{__('cart.Image')}}
                                </div>
                                <div class="cart-table-prd-content-wrap">
                                    <div class="cart-table-prd-info">{{__('cart.Name')}}</div>
                                    <div class="cart-table-prd-qty">{{__('cart.Qty')}}</div>
                                    <div class="cart-table-prd-price">{{__('cart.Price')}}</div>
                                    <div class="cart-table-prd-action">&nbsp;</div>
                                </div>
                            </div>
                            @foreach($giftsInCart as $gift)
                                <div class="cart-table-prd">

                                    <div class="cart-table-prd-image">
                                        <a href="#" class="prd-img"><img class="lazyload fade-up"
                                                                                    src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                                                    data-src="{{asset($gift->image)}}"
                                                                                    alt=""></a>
                                    </div>
                                    <div class="cart-table-prd-content-wrap">

                                        <div class="cart-table-prd-info">
                                            <div class="cart-table-prd-price">
                                                <div class="price-new">{{$gift->price}} {{__('cart.KZT')}}</div>
                                            </div>
                                            <h1 class="cart-table-prd-name"><a href="#">{{$gift->{'name_'.app()->getLocale()} }}</a>
                                            </h1>

                                        </div>
                                        <div class="cart-table-prd-qty">
                                            <div class="qty qty-changer">
                                                <form action="{{route('cart.puttocart',$gift->id)}}" method="post">
                                                    @csrf
                                                    <button class="increase"></button>
                                                </form>
                                                <form action="{{route('cart.removecart',$gift->id)}}" method="post">
                                                    @csrf
                                                    <button class="decrease"></button>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="cart-table-prd-price-total">
                                            {{$gift->price}} {{__('cart.KZT')}} x {{$gift->pivot->number}}
                                        </div>
                                    </div>
                                    <div class="cart-table-prd-action">
                                        <form action="{{route('cart.deletefromcart',$gift->id)}}" method="post">
                                            @csrf
                                            <button class="cart-table-prd-remove btn btn-secondary-soft" style="background-color: white" data-tooltip="Remove Product"><i
                                                    class="icon-recycle"></i></button>
                                        </form>

                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="text-center mt-1">
                            <form action="{{route('cart.deleteallcart')}}" method="post">
                                @csrf
                                <button class="btn btn--grey">{{__('cart.Clear All')}}</button>
                            </form>
                        </div>
                    </div>
                    <!--                ENDSOLZHAQ-->
                    <!--                ONZHAQ-->
                    <div class="col-lg-7 col-xl-5 mt-3 mt-md-0">
                        <div class="card-total">
                            <div class="row d-flex">
                                <div class="col card-total-txt">{{__('cart.Total')}}</div>
                                <div class="col-auto card-total-price text-right">{{$total}}
                                    {{__('cart.KZT')}}
                                </div>
                            </div>
                            <form action="{{route('cart.buy')}}" method="post">
                                @csrf
                                <button class="btn btn--full btn--lg"><span>{{__('cart.Checkout')}}</span></button>
                            </form>
{{--                            <div class="card-text-info text-right">--}}
{{--                                <h5>Standart shipping</h5>--}}
{{--                                <p><b>10 - 11 business days</b><br>1 item ships from the U.S. and will be delivered in--}}
{{--                                    10 ---}}
{{--                                    11 business days</p>--}}
{{--                            </div>--}}
                        </div>
                        <div class="mt-2"></div>
                        <div class="panel-group panel-group--style1 prd-block_accordion" id="productAccordion">
{{--                            <div class="panel">--}}
{{--                                <div class="panel-heading active">--}}
{{--                                    <h4 class="panel-title">--}}
{{--                                        <a data-toggle="collapse" data-parent="#productAccordion" href="#collapse1">Shipping--}}
{{--                                            options</a>--}}
{{--                                        <span class="toggle-arrow"><span></span><span></span></span>--}}
{{--                                    </h4>--}}
{{--                                </div>--}}
{{--                                <div id="collapse1" class="panel-collapse collapse show">--}}
{{--                                    <div class="panel-body">--}}
{{--                                        <label>City:</label>--}}
{{--                                        <div class="form-group select-wrapper select-wrapper-sm">--}}
{{--                                            <select class="form-control form-control--sm">--}}
{{--                                                <option value="Almaty">Almaty</option>--}}
{{--                                                <option value="Astana">Astana</option>--}}
{{--                                                <option value="Shymkent">Shymkent</option>--}}
{{--                                                <option value="Taraz">Taraz</option>--}}
{{--                                                <option value="Qyzylorda">Qyzylorda</option>--}}
{{--                                                <option value="Semey">Semey</option>--}}
{{--                                                <option value="Oskemen">Oskemen</option>--}}
{{--                                                <option value="Aqtau">Aqtau</option>--}}
{{--                                                <option value="other">Other..</option>--}}
{{--                                            </select>--}}
{{--                                        </div>--}}
{{--                                        <label>Audan:</label>--}}
{{--                                        <div class="form-group select-wrapper select-wrapper-sm">--}}
{{--                                            <select class="form-control form-control--sm">--}}
{{--                                                <option value="AL">Alabama</option>--}}
{{--                                                <option value="AK">Alaska</option>--}}
{{--                                                <option value="AZ">Arizona</option>--}}
{{--                                                <option value="AR">Arkansas</option>--}}
{{--                                                <option value="CA">California</option>--}}
{{--                                                <option value="CO">Colorado</option>--}}
{{--                                                <option value="CT">Connecticut</option>--}}
{{--                                                <option value="DE">Delaware</option>--}}
{{--                                                <option value="DC">District Of Columbia</option>--}}
{{--                                                <option value="FL">Florida</option>--}}
{{--                                                <option value="GA">Georgia</option>--}}
{{--                                                <option value="HI">Hawaii</option>--}}
{{--                                                <option value="ID">Idaho</option>--}}
{{--                                                <option value="IL">Illinois</option>--}}
{{--                                                <option value="IN">Indiana</option>--}}
{{--                                                <option value="IA">Iowa</option>--}}
{{--                                                <option value="KS">Kansas</option>--}}
{{--                                                <option value="KY">Kentucky</option>--}}
{{--                                                <option value="LA">Louisiana</option>--}}
{{--                                            </select>--}}
{{--                                        </div>--}}
{{--                                        <label>Zip/Postal code:</label>--}}
{{--                                        <div class="form-group">--}}
{{--                                            <input type="text" class="form-control form-control--sm">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <div class="panel">
                                <div class="panel-heading active">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#productAccordion" href="#collapse2">{{__('cart.Discount Code')}}</a>
                                        <span class="toggle-arrow"><span></span><span></span></span>
                                    </h4>
                                </div>
                                <div id="collapse2" class="panel-collapse collapse show">
                                    <div class="panel-body">
                                        <p>{{__('cart.Got a promo code? Then youre a few randomly combined numbers & letters away from fab savings!')}}</p>
                                        <div class="form-inline mt-2">
                                            <input type="text" class="form-control form-control--sm"
                                                   placeholder="{{__('cart.Promotion/Discount Code')}}">
                                            <button type="submit" class="btn">{{__('cart.Apply')}}</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
{{--                            <div class="panel">--}}
{{--                                <div class="panel-heading active">--}}
{{--                                    <h4 class="panel-title">--}}
{{--                                        <a data-toggle="collapse" data-parent="#productAccordion" href="#collapse3">Note--}}
{{--                                            for--}}
{{--                                            the seller</a>--}}
{{--                                        <span class="toggle-arrow"><span></span><span></span></span>--}}
{{--                                    </h4>--}}
{{--                                </div>--}}
{{--                                <div id="collapse3" class="panel-collapse collapse show">--}}
{{--                                    <div class="panel-body">--}}
{{--                                    <textarea class="form-control form-control--sm textarea--height-100"--}}
{{--                                              placeholder="Text here"></textarea>--}}
{{--                                        <div class="card-text-info mt-2">--}}
{{--                                            <p>*Savings include promotions, coupons, rueBUCKS, and shipping (if--}}
{{--                                                applicable).</p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                        </div>
                    </div>
                    <!--                ENDONZHAQ-->
                </div>
            </div>
        </div>
        @else
            <div class="holder mt-0">
                <div class="container">
                    <div class="page404-bg">
                        <div class="page404-text">
                            <div class="minicart-empty-icon">
                                <i class="icon-shopping-bag"></i>
                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 306 262"
                                     style="enable-background:new 0 0 306 262;" xml:space="preserve"><path class="st0"
                                                                                                           d="M78.1,59.5c0,0-37.3,22-26.7,85s59.7,237,142.7,283s193,56,313-84s21-206-69-240s-249.4-67-309-60C94.6,47.6,78.1,59.5,78.1,59.5z"/></svg>
                            </div>
                            <div class="txt2">{{__('cart.our shopping cart is empty!')}}</div>
                        </div>
                    </div>
                </div>
            </div>
        @endisset
    </div>

@endsection

