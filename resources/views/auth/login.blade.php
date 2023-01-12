@extends('layouts.app3')

@section('content')
    <div class="page-content">
        <div class="holder">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-18 col-lg-12">
                        <h2 class="text-center">{{__('buttons.login')}}</h2>
                        <div class="form-wrapper">
                            <p>{{__('register.To access your whishlist, address book and contact preferences and to take advantage of
                                our speedy checkout, create an account with us now.')}}</p>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="row justify-content-center">
                                    <div class="col-10">
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
                                <div class="text-center mb-4 mt-4">
                                    <button class="btn">{{__('buttons.login')}}</button>
                                </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
