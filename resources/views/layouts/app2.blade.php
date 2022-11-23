@extends('layouts.adm2head')
@section('title','MAIN')
@section('app2')
    <!-- END: Head -->
    <body class="py-5">
    <!-- BEGIN: Top Bar -->
    <div class="border-b border-white/[0.08] mt-[2.2rem] md:-mt-5 -mx-3 sm:-mx-8 px-3 sm:px-8 pt-3 md:pt-0 mb-10">
        <div class="top-bar-boxed flex items-center">
            <!-- BEGIN: Logo -->
            <a href="" class="-intro-x hidden md:flex">
                <img alt="Fixbox" src="dist/fixbox.png" width="100" height="100">
            </a>
            <!-- END: Logo -->
            <!-- BEGIN: Breadcrumb -->
            <nav aria-label="breadcrumb" class="-intro-x h-full mr-auto">
                <ol class="breadcrumb breadcrumb-light">
                    <li class="breadcrumb-item"><a href="#">Main Page</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Gifts</li>
                </ol>
            </nav>
            <!-- END: Breadcrumb -->
            <!-- BEGIN: Search -->
            <div class="intro-x relative mr-3 sm:mr-6">
                <div class="search hidden sm:block">
                    <input type="text" class="search__input form-control border-transparent" placeholder="Search...">
                    <i data-lucide="search" class="search__icon dark:text-slate-500"></i>
                </div>
                <a class="notification notification--light sm:hidden" href=""> <i data-lucide="search"
                                                                                  class="notification__icon dark:text-slate-500"></i>
                </a>
                <div class="search-result">
                    <div class="search-result__content">
                        <div class="search-result__content__title">Pages</div>
                        <div class="mb-5">
                            <a href="" class="flex items-center">
                                <div
                                    class="w-8 h-8 bg-success/20 dark:bg-success/10 text-success flex items-center justify-center rounded-full">
                                    <i class="w-4 h-4" data-lucide="inbox"></i></div>
                                <div class="ml-3">Mail Settings</div>
                            </a>
                            <a href="" class="flex items-center mt-2">
                                <div
                                    class="w-8 h-8 bg-pending/10 text-pending flex items-center justify-center rounded-full">
                                    <i class="w-4 h-4" data-lucide="users"></i></div>
                                <div class="ml-3">Users & Permissions</div>
                            </a>
                            <a href="" class="flex items-center mt-2">
                                <div
                                    class="w-8 h-8 bg-primary/10 dark:bg-primary/20 text-primary/80 flex items-center justify-center rounded-full">
                                    <i class="w-4 h-4" data-lucide="credit-card"></i></div>
                                <div class="ml-3">Transactions Report</div>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
            <!-- END: Search -->
            <!-- BEGIN: Account Menu -->
            <div class="intro-x dropdown w-8 h-8">
                <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in scale-110"
                     role="button" aria-expanded="false" data-tw-toggle="dropdown">
                    <img class="img-profile rounded-circle"
                         @auth src="{{asset('storage/image/users/'.Auth::user()->image)}}"
                         @else src="{{asset('img/undraw_profile.svg')}}" @endauth>
                </div>
                <div class="dropdown-menu w-56">
                    <ul class="dropdown-content bg-primary/80 before:block before:absolute before:bg-black before:inset-0 before:rounded-md before:z-[-1] text-white">
                        <li class="p-2">
                            <div class="font-medium">@auth {{ Auth::user()->name }} @endauth</div>
                        </li>
                        @auth
                            <li>
                                <hr class="dropdown-divider border-white/[0.08]">
                            </li>
                            <li>
                                <a href="{{route('profile.form')}}" class="dropdown-item hover:bg-white/5"> <i
                                        data-lucide="user"
                                        class="w-4 h-4 mr-2"></i> Profile
                                </a>
                            </li>
                        @endauth
                        @guest
                            @if(Route::has('register.form'))
                                <li>
                                    <a href="{{ route('register.form') }}" class="dropdown-item hover:bg-white/5"> <i
                                            data-lucide="user"
                                            class="w-4 h-4 mr-2"></i>{{ __('Register') }}</a>
                                </li>
                            @endif
                            @if(Route::has('login.form'))
                                <li>
                                    <a href="{{ route('login.form') }}" class="dropdown-item hover:bg-white/5"> <i
                                            data-lucide="user"
                                            class="w-4 h-4 mr-2"></i>{{ __('Login') }}</a>
                                </li>
                            @endif
                            <li>
                                <hr class="dropdown-divider border-white/[0.08]">
                            </li>
                        @else
                            <li>
                                <a class="dropdown-item" href="#" data-toggle="modal"
                                   data-target="#logoutModal" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ ('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        @endguest
                    </ul>
                    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">Select "Logout" below if you are ready to end your current
                                    session.
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                    <form action="{{ route('logout') }}" method="post">
                                        @csrf
                                        <button class="btn btn-primary">Logout</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- END: Account Menu -->
        </div>
    </div>
    <!-- END: Top Bar -->
    <!-- BEGIN: Top Menu -->
    <nav class="top-nav">
        <ul>
            <li>
                <a href="javascript:;.html" class="top-menu top-menu--active">
                    <div class="top-menu__icon"><i data-lucide="home"></i></div>
                    <div class="top-menu__title"> Gifts <i data-lucide="chevron-down" class="top-menu__sub-icon"></i>
                    </div>
                </a>
                <ul class="top-menu__sub-open">
                    <li>
                        <a href="top-menu-light-dashboard-overview-1.html" class="top-menu">
                            <div class="top-menu__icon"><i data-lucide="activity"></i></div>
                            <div class="top-menu__title">For him</div>
                        </a>
                    </li>
                    <li>
                        <a href="top-menu-light-dashboard-overview-2.html" class="top-menu">
                            <div class="top-menu__icon"><i data-lucide="activity"></i></div>
                            <div class="top-menu__title"> For her</div>
                        </a>
                    </li>
                    <li>
                        <a href="top-menu-light-dashboard-overview-3.html" class="top-menu">
                            <div class="top-menu__icon"><i data-lucide="activity"></i></div>
                            <div class="top-menu__title"> For animals</div>
                        </a>
                    </li>
                    <li>
                        <a href="top-menu-light-dashboard-overview-4.html" class="top-menu">
                            <div class="top-menu__icon"><i data-lucide="activity"></i></div>
                            <div class="top-menu__title"> For family</div>
                        </a>
                    </li>
                </ul>
            </li>
            @isset($categories)
                @foreach($categories as $cat)

                    <li>
                        <a href="javascript:;" class="top-menu">
                            <div class="top-menu__icon"><i data-lucide="sidebar"></i></div>
                            <div class="top-menu__title">{{$cat->name}} <i data-lucide="chevron-down"
                                                                           class="top-menu__sub-icon"></i>
                            </div>
                        </a>

                        <ul class="">
                            @foreach($cat->categories as $c)
                                <li>
                                    <a href="{{route('gift.category',$c->id)}}" class="top-menu">
                                        <div class="top-menu__icon"><i data-lucide="activity"></i></div>
                                        <div class="top-menu__title"> {{$c->name}}<i data-lucide="chevron-down"
                                                                                     class="top-menu__sub-icon"></i>
                                        </div>
                                    </a>
                                    <ul class="">
                                        @foreach($c->categories as $cs)
                                            <li>
                                                <a href="{{route('gift.category',$cs->id)}} " class="top-menu">
                                                    <div class="top-menu__icon"><i data-lucide="zap"></i></div>
                                                    <div class="top-menu__title">{{$cs->name}}</div>
                                                </a>
                                            </li>
                                        @endforeach

                                    </ul>
                                </li>
                            @endforeach

                        </ul>

                    </li>
                @endforeach

            @endisset
        </ul>
    </nav>
    <!-- END: Top Menu -->
    <!-- BEGIN: Content -->
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    @if(session('message'))
                        <div class="alert alert-success" role="alert">
                            {{session('message')}}
                        </div>
                    @endif
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        @yield('content')
    </div>

    <!-- END: Content -->
@endsection
