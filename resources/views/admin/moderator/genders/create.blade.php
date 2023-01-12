@extends('layouts.app')

@section('title','CREATE PAGE')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <form action="{{route('adm.genders.store')}}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Gender</label>
                        <input type="text" id="title" name="gender_en" class="form-control @error('gender_en') is-invalid @enderror"  placeholder="1 ші этаптағы санат">
                        @error('gender_en')
                        <div class="invalid-feedback" >{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="title" class="form-label">Пол</label>
                        <input type="text" id="title" name="gender_ru" class="form-control @error('gender_ru') is-invalid @enderror"  placeholder="2 ші этаптағы санат">
                        @error('gender_ru')
                        <div class="invalid-feedback" >{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="title" class="form-label">Жыныс</label>
                        <input type="text" id="title" name="gender_kz" class="form-control @error('gender_kz') is-invalid @enderror"  placeholder="3 ші этаптағы санат">
                        @error('gender_kz')
                        <div class="invalid-feedback" >{{$message}}</div>
                        @enderror
                    </div>
                    <button class="btn btn-success">{{__('buttons.add')}}</button>
                </form>
            </div>
        </div>
    </div>

@endsection

