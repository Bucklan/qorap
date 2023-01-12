@extends('layouts.app')

@section('title','CATEGORY PAGE')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col" width="25%">#</th>
                        <th scope="col" width="25%">Name</th>
                        <th scope="col" width="25%">Details</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($category as $categor)
                        <tr>
                            <th scope="row">{{$categor->id}}</th>
                            <td>{{$categor->{'name_'.app()->getLocale()} }}</td>
                            <td>
                                <a href="{{route('adm.categories.show',$categor->id)}}" class="btn btn-success">DETAILS</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

