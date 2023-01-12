@extends('layouts.app3')

@section('title','CREATE PAGE')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <form action="{{route('partner.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">{{__('login.email')}}</label>
                        <input type="text" id="name" class="form-control"  placeholder="{{__('login.email')}}" readonly value="{{$user->name}}">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">{{__('login.email')}}</label>
                        <input type="text" id="email" class="form-control"  placeholder="{{__('login.email')}}" readonly value="{{$user->email}}">
                    </div>
                    <div class="mb-3">
                        <label for="name_company" class="form-label">{{__('profile.Your Company Name')}}</label>
                        <input type="text" name="name_company" id="name_company" class="form-control"  placeholder="{{__('profile.Your Company Name')}}">
                        @error('name_company')
                        <div class="invalid-feedback" >{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">{{__('profile.Image Company')}} (<em> format: PNG</em>)</label>
                        <input class="form-control @error('image') is-invalid @enderror" id="image" type="file" accept="image/png" name="image">
                        @error('image')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-success">{{__('buttons.send')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

