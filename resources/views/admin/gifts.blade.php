@extends('layouts.app')

@section('title','USERS PAGE')

@section('content')
    <div class="container">


        <div class="row mt-3">
            <div class="col-12">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Content</th>
                        <th scope="col">Price</th>
                        <th scope="col">Categories</th>
                        <th scope="col">DETAILS</th>
                    </tr>
                    </thead>
                    <tbody>
                    @for($i = 0;$i<count($gifts);$i++)
                        <tr>
                            <th scope="row">{{$i+1}}</th>
                            <td>{{$gifts[$i]->{'name_'.app()->getLocale() } }}</td>
                            <td>{{$gifts[$i]->{'content_'.app()->getLocale() } }}</td>
                            <td>{{$gifts[$i]->price}}</td>
                            <td>{{$gifts[$i]->category->{'name_'.app()->getLocale() } }}</td>
                            <td>
                                <a href="" class="btn btn-success">DETAILS</a>
                            </td>
                        </tr>
                    @endfor
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

