@extends('layouts.app3')

@section('content')
    <div class="page-content">
        <div class="holder">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-18 col-lg-12">
                        <h2 class="text-center">{{__('register.Create an Account')}}</h2>
                        <div class="form-wrapper">
                            <p>{{__('register.To access your whishlist, address book and contact preferences and to take advantage of
                                our speedy checkout, create an account with us now.')}}</p>
                            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <input type="text" name="name"
                                                   class="form-control @error('name') is-invalid @enderror"
                                                   placeholder="{{__('register.fullname')}}">
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                               <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control  @error('email') is-invalid @enderror" placeholder="{{__('login.email')}}">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                               <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="{{__('login.password')}}">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                               <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password_confirmation" class="form-control" placeholder="{{__('register.repassword')}}">
                                </div>
                                <div class="form-group">
                                    <label for="image" class="form-label">{{__('cart.Image')}}</label>
                                    <input class="form-control @error('image') is-invalid @enderror" id="image" type="file"
                                           accept="image/png, image/gif, image/jpeg" name="image">

                                    @error('image')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="clearfix">
                                    <input id="checkbox1" name="checkbox1" type="checkbox" checked="checked">
                                    <label for="checkbox1">{{__('register.By registering your details you agree to our Terms and Conditions and Cookie Policy')}}</label>
                                </div>
                                <div class="text-center">
                                    <button class="btn">{{__('register.create an account')}}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
