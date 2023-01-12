@extends('layouts.app')

@section('title','CREATE PAGE')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <form action="{{route('gift.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="nameen" class="form-label">Name Gifts</label>
                        <input type="text" id="nameen" name="name_en"
                               class="form-control @error('name_en') is-invalid @enderror" placeholder="Name Gifts ">
                        @error('name_en')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="namekz" class="form-label">Сыйлықтың аты </label>
                        <input type="text" id="namekz" name="name_kz"
                               class="form-control @error('name_kz') is-invalid @enderror" placeholder="Сыйлықтың аты">
                        @error('name_kz')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="nameru" class="form-label">Названия подарка</label>
                        <input type="text" id="nameru" name="name_ru"
                               class="form-control @error('name_ru') is-invalid @enderror"
                               placeholder="Названия подарка">
                        @error('name_ru')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="contentEn" class="form-label">Content English</label>
                        <textarea name="content_en" class="form-control @error('content_en') is-invalid @enderror"
                                  id="contentEn" placeholder="Content English"></textarea>
                        @error('content_en')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="contentkz" class="form-label">Қазақша сауалнамасы</label>
                        <textarea name="content_kz" class="form-control @error('content_kz') is-invalid @enderror"
                                  id="content_kzkz" placeholder="Қазақша сауалнамасы"></textarea>
                        @error('content_kz')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="contentru" class="form-label">Введите описания для подарка на русском языке</label>
                        <textarea name="content_ru" class="form-control @error('content_ru') is-invalid @enderror"
                                  id="contentru" placeholder="Введите описания для подарка на русском языке"></textarea>
                        @error('content_ru')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">{{__('cart.Price')}}</label>
                        <input type="number" min="0" id="price" name="price"
                               class="form-control @error('price') is-invalid @enderror" placeholder="{{__('cart.Price')}}">

                        @error('price')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">{{__('cart.Image')}}</label>
                        <input class="form-control @error('image') is-invalid @enderror" id="image" type="file"
                               accept="image/png, image/gif, image/jpeg" name="image">

                        @error('image')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <select name="category_id" class="form-select @error('category_id') is-invalid @enderror"
                                aria-label="Default select example">
                            @foreach($categories as $cat)
                                @foreach($cat->categories as $c)
                                    <option value="{{$c->id}}" disabled>{{$c->{'name_'.app()->getLocale() } }}</option>
                                    @foreach($c->categories as $cs)
                                        <option value="{{$cs->id}}">--{{$cs->{'name_'.app()->getLocale() } }}</option>
                                    @endforeach
                                @endforeach
                            @endforeach
                        </select>
                        @error('category_id')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
{{--                    <div class="form-check">--}}
{{--                        <input class="form-check-input" name="pre-order" type="checkbox" value="true" id="flexCheckDefault">--}}
{{--                        <label class="form-check-label" for="flexCheckDefault">--}}
{{--                            pre-order--}}
{{--                        </label>--}}
{{--                    </div>--}}
{{--                    <div class="form- check">--}}
{{--                        <input class="form-check-input" name="black_friday" type="checkbox" value="true" id="flexCheckChecked">--}}
{{--                        <label class="form-check-label" for="flexCheckChecked">--}}
{{--                            Black friday--}}
{{--                        </label>--}}
{{--                    </div>--}}
{{--                    <div class="form-check">--}}
{{--                        <label class="form-check-label" for="flexCheckChecked">--}}
{{--                            SALES %--}}
{{--                        </label>--}}
{{--                        <input class="form-control @error('image') is-invalid @enderror" type="number" name="sales" max="99">--}}
{{--                    </div>--}}
                    <div class="mb-3">
                        <button class="btn btn-success">{{__('buttons.save')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

