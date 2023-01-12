@extends('layouts.app3')

@section('title','CREATE PAGE')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <form action="{{route('balance')}}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="nameen" class="form-label">{{__('How much is needed')}}</label>
                        <input type="number" id="nameen" name="price" max="42500"
                               class="form-control @error('price') is-invalid @enderror" placeholder="{{__('How much is needed')}}">
                        @error('price')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-success">{{__('buttons.save')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

