@extends('layouts.app')

@section('title','DETAILS PAGE')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="mb-3">
                    <label for="title" class="form-label">Gender</label>
                    <input type="text" id="title" value="{{$genders->gender_en}}"
                           class="form-control @error('gender_en') is-invalid @enderror" readonly>
                    @error('gender_en')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">Пол</label>
                    <input type="text" id="title" value="{{$genders->gender_ru}}"
                           class="form-control @error('gender_ru') is-invalid @enderror" readonly>
                    @error('gender_ru')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">Жыныс</label>
                    <input type="text" id="title" value="{{$genders->gender_kz}}"
                           class="form-control @error('gender_kz') is-invalid @enderror" readonly>
                    @error('gender_kz')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <form action="{{route('adm.genders.destroy',$genders->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger form-check">{{__('buttons.delete')}}}</button>
                        <a href="{{route('adm.genders.edit',$genders->id)}}"
                           class="btn btn-success form-check">{{__('buttons.edit')}}</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
