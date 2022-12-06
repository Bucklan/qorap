@extends('layouts.app2')

@section('title','CART PAGE')

@section('content')
    @isset($giftsInNull)
        <h2 class="text-lg font-medium mr-auto">
            Cart Page
        </h2>
    @endisset
    <div class="content">
        <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
            <h2 class="text-lg font-medium mr-auto">
                Cart Page
            </h2>
        </div>
        <div class="intro-y col-span-12 overflow-auto 2xl:overflow-visible">
            <table class="table table-report mt-3">
                <thead>
                <tr>
                    <th class="whitespace-nowrap text-right">BUYER NAME</th>
                    <th class="whitespace-nowrap text-center">ADD OR REMOVE</th>
                    <th class="text-right whitespace-nowrap">
                        TOTAL TRANSACTION
                    </th>
                    <th class="text-center whitespace-nowrap">STATUS</th>
                    <th class="text-center whitespace-nowrap">DELETED</th>
                </tr>
                </thead>
                <tbody> @foreach($giftsInCart as $gift)
                <tr class="intro-x">

                    <td class="w-40 text-right">
                        <a href="" class="font-medium whitespace-nowrap">{{$gift->name}}</a>
                    </td>
                    <td>
                        <div class="flex justify-center items-center">
                            <form action="{{route('cart.puttocart',$gift->id)}}" method="post">
                                @csrf
                                <button><i data-lucide="plus" class="block mx-auto" style="color: #00ab14"></i></button>
                            </form>
                            <form action="{{route('cart.removecart',$gift->id)}}" method="post">
                                @csrf
                                <button><i data-lucide="minus" class="block mx-auto" style="color: #ab0001"></i></button>
                            </form>
                        </div>
                    </td>
                    <td class="w-40 text-right">
                        <div class="pr-16">{{$gift->price*$gift->pivot->number}} KZT</div>
                    </td>
                    <td class="text-center">
                        <div class="flex items-center justify-center whitespace-nowrap text-success"> <i data-lucide="check-square" class="w-4 h-4 mr-2"></i> {{$gift->pivot->status}} </div>
                    </td>
                    <td class="table-report__action">
                        <div class="flex justify-center items-center">
                            <form action="{{route('cart.deletefromcart',$gift->id)}}" method="post">
                                @csrf
                                <button><i data-lucide="trash-2" class="block mx-auto" style="color: #ab0001"></i></button>
                            </form>
                        </div>
                    </td>

                </tr>  @endforeach
                </tbody>
            </table>
        </div>
        <form action="{{route('cart.buy')}}" method="post">
                @csrf
                <button class="btn btn-success">Buy</button>
            </form>
    </div>
@endsection

