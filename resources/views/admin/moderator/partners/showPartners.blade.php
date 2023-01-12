@extends('layouts.app')

@section('title','Partner PAGE')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                {{--                <form action="{{route('partner.store')}}" method="post" enctype="multipart/form-data">--}}
                @csrf

                <div class="card text-center mt-3" style="color: black">
                    <img src="{{asset($partner->image)}}"
                         class="card-img-top"
                         width="250" height="300"/>
                </div>
                <div class="mb-3 mt-3">
                    <label for="name_company" class="form-label">{{__('profile.Your Company Name')}}</label>
                    <input type="text" value="{{$partner->name_company}}" readonly name="name_company" id="name_company"
                           class="form-control" placeholder="{{__('profile.Your Company Name')}}">
                    @error('name_company')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <form action="{{route('adm.partner.update',$partner->id)}}" method="post">
                    @csrf
                    @method('PUT')
                <div class="mb-3">
                        <button class="btn btn-success">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                 class="bi bi-check" viewBox="0 0 16 16">
                                <path
                                    d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                            </svg>
                        </button>
                    </div>
                </form>
                <form action="{{route('adm.partner.delete',$partner->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <div class="mb-3">
                        <button class="btn btn-danger">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                 class="bi bi-x-lg" viewBox="0 0 16 16">
                                <path
                                    d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/>
                            </svg>
                        </button>
                    </div>
                </form>

                {{--                </form>--}}
            </div>
        </div>
    </div>

@endsection



