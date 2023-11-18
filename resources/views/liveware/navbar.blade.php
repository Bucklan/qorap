
<div class="bg-white">

    <header class="relative bg-white">
        <p class="flex h-10 items-center justify-center bg-indigo-600 px-4 text-sm font-medium text-white sm:px-6 lg:px-8">Get free delivery on orders over $100</p>

        <nav aria-label="Top" class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="border-b border-gray-200">
                <div class="flex h-16 items-center">
                    <!-- Mobile menu toggle, controls the 'mobileMenuOpen' state. -->

                    <!-- Logo -->

                    <!-- Flyout menus -->
                    <div class="hidden lg:ml-8 lg:block lg:self-stretch">
                        <div class="flex h-full space-x-8">
                            <a href="{{route('products.index')}}" class="flex items-center text-sm font-medium text-gray-700 hover:text-gray-800">Products</a>
                            <a href="#" class="flex items-center text-sm font-medium text-gray-700 hover:text-gray-800">Stores</a>
                        </div>
                    </div>

                    <div class="ml-auto flex items-center">
                        @if($user = !Auth::check())
                            <div class="hidden lg:flex lg:flex-1 lg:items-center lg:justify-end lg:space-x-6">
                                <a href="{{url('/login')}}" class="text-sm font-medium text-gray-700 hover:text-gray-800">Sign in</a>
                                <span class="h-6 w-px bg-gray-200" aria-hidden="true"></span>
                                <a href="{{url('/register')}}" class="text-sm font-medium text-gray-700 hover:text-gray-800">Create account</a>
                            </div>
                        @else
                            <div class="hidden lg:flex lg:flex-1 lg:items-center lg:justify-end lg:space-x-6">
                                <form action="{{route('logout')}}" method="post">
                                    @csrf
                                    @method('post')
                                    <button class="text-sm font-medium text-gray-700 hover:text-gray-800">Logout</button>
                                </form>
                                <span class="h-6 w-px bg-gray-200" aria-hidden="true"></span>
                            </div>
                        @endif

                        <div class="hidden lg:ml-8 lg:flex">
                            <a href="#" class="flex items-center text-gray-700 hover:text-gray-800">
                                <img src="https://tailwindui.com/img/flags/flag-canada.svg" alt="" class="block h-auto w-5 flex-shrink-0">
                                <span class="ml-3 block text-sm font-medium">KZ</span>
                                <span class="sr-only">, change currency</span>
                            </a>
                        </div>
                            <div class="ml-4 flow-root lg:ml-6">
                                @if(!$user)
                                    {{\Illuminate\Support\Facades\Auth::user()->name}}
                                @endif
                            </div>


                        <!-- Cart -->
                        <div class="ml-4 flow-root lg:ml-6">
                            <a href="#" class="group -m-2 flex items-center p-2">
                                <svg class="h-6 w-6 flex-shrink-0 text-gray-400 group-hover:text-gray-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                                </svg>
                                <span class="ml-2 text-sm font-medium text-gray-700 group-hover:text-gray-800">0</span>
                                <span class="sr-only">items in cart, view bag</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>
</div>
