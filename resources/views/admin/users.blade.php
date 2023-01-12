@extends('layouts.app')

@section('title','USERS PAGE')

@section('content')
    <div class="container">
        <form action="{{route('adm.users.search')}}" method="GET">
            <input type="text" name="search" class="search__input form-control border-transparent"
                   placeholder="{{__('buttons.search')}}...">
            <button class="btn btn-dark">{{__('buttons.search')}}</button>
        </form>
        <div class="row">
            <div class="col-12">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">{{__('cart.Name')}}</th>
                        <th scope="col">{{__('login.email')}}</th>
                        <th scope="col">{{__('buttons.Role')}}</th>
                        <th scope="col">{{__('buttons.status')}}</th>
                        <th scope="col">{{__('buttons.details')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @for($i = 0;$i<count($users);$i++)
                        <tr>
                            <th scope="row">{{$i+1}}</th>
                            <td>{{$users[$i]->name}}</td>
                            <td>{{$users[$i]->email}}</td>
                            <td>{{$users[$i]->role->name}}</td>
                            <td>
                                <form action="@if($users[$i]->is_active){{route('adm.users.ban',$users[$i]->id)}}@else{{route('adm.users.unban',$users[$i]->id)}}@endif" method="post">
                                    @csrf
                                    @method('PUT')
                                    <button class="btn {{$users[$i]->is_active ?' btn-danger' : 'btn-success'}}">
                                        @if($users[$i]->is_active)
                                            {{__('buttons.ban')}}
                                        @else
                                            {{__('buttons.unban')}}
                                        @endif
                                    </button>
                                </form>
                            </td>
                            <td>
                                <a href="{{route('adm.users.edit',$users[$i]->id)}}" class="btn btn-success">{{__('buttons.details')}}
                                </a>
                            </td>
                        </tr>
                    @endfor
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

