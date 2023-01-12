@extends('layouts.app')

@section('title','EDIT PAGE')

@section('content')

    <div class="container">
        <a href="{{route('adm.genders.show',$genders->id)}}" class="btn btn-success">Go to Back</a>
        <div class="row">
            <div class="col-sm-12">
                <form action="{{route('adm.genders.update',$genders->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="title" class="form-label">Gender</label>
                        <input type="text" id="title" name="gender_en" value="{{$genders->gender_en}}"
                               class="form-control @error('gender_en') is-invalid @enderror">
                        @error('gender_en')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="title" class="form-label">Пол</label>
                        <input type="text" id="title" name="gender_ru" value="{{$genders->gender_ru}}"
                               class="form-control @error('gender_ru') is-invalid @enderror">
                        @error('gender_ru')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="title" class="form-label">Жыныс</label>
                        <input type="text" id="title" name="gender_kz" value="{{$genders->gender_kz}}"
                               class="form-control @error('gender_kz') is-invalid @enderror">
                        @error('gender_kz')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-success">EDIT</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection


