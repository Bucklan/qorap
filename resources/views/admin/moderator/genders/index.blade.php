@extends('layouts.app')

@section('title','GENDER PAGE')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col" width="25%">#</th>
                        <th scope="col" width="25%">Gender</th>
                        <th scope="col" width="25%">Пол</th>
                        <th scope="col" width="25%">Жыныс</th>
                        <th scope="col" width="25%">{{__('buttons.details')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @for($i = 0;$i<count($genders);$i++)
                        <tr>
                            <th scope="row">{{$i+1}}</th>
                            <td>{{$genders[$i]->gender_en}}</td>
                            <td>{{$genders[$i]->gender_ru}}</td>
                            <td>{{$genders[$i]->gender_kz}}</td>
                            <td>
                                <a href="{{route('adm.genders.show',$genders[$i]->id)}}" class="btn btn-success">{{__('buttons.details')}}</a>
                            </td>
                        </tr>
                    @endfor
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

