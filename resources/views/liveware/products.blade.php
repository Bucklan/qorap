<div>
    <livewire:navbar/>
    <div class="mx-auto max-w-2xl px-4 py-4 sm:px-6 sm:py-12 lg:max-w-7xl lg:px-8 mt-4">
        @if(session('message'))
            <div id="{{$alertClass ? 'opacity-0' : ''}} alert-border-3" class="flex items-center p-4 mb-4 text-green-800 border-t-4 border-green-300 bg-green-50" role="alert">
                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                </svg>
                <div class="ms-3 text-sm font-medium">
                    {{session('message')}}
                </div>
                <button wire:click.prevent="addClass" class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8" >
                    <span class="sr-only">Dismiss</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                </button>
            </div>
       @endif
        <div class="space-y-6">
            <div class="flex justify-between">
                <div class="space-x-8">
                    <input wire:model.live="searchQuery"
                           type="search"
                           id="search"
                           placeholder="Search...">

                    <select wire:model.live="searchCategory"
                            name="category">
                        <option value="0">
                            --
                            CHOOSE
                            CATEGORY
                            --
                        </option>
                        @foreach($categories as $value => $category)
                            @php
                                $categoryName = json_decode($category, true)
                            @endphp
                            <option value="{{$value}}">{{ $categoryName['en'] }}</option>
                        @endforeach
                    </select>
                </div>
                @can(\App\Enums\User\Permission::PRODUCTS->value)
                    <a wire:navigate
                       href="{{ route('products.create') }}"
                       class="inline-flex items-center px-4 py-2 bg-gray-800 rounded-md font-semibold text-xs text-white uppercase tracking-widest">
                        Add
                        new
                        product
                    </a>
                @endcan
            </div>
        </div>
        <div class="text-red-600"
             wire:loading>
            Loading...
        </div>
        <div class="bg-white">
            <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
                <h2 class="text-2xl font-bold tracking-tight text-gray-900">
                    Products</h2>

                <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
                    @forelse($products as $product)
                        <div class="group relative {{$product->quantity ? '' : 'opacity-25'}}">
                            <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md bg-gray-200 lg:aspect-none group-hover:opacity-75 lg:h-80">
                                @if($media = $product->getFirstMedia('products'))
                                    <img src="{{$media->getUrl()}}"
                                         alt="Front of men&#039;s Basic Tee in black."
                                         class="h-full w-full object-cover object-center lg:h-full lg:w-full">
                                @else
                                    <img src="https://tailwindui.com/img/ecommerce-images/product-page-01-related-product-01.jpg"
                                         alt="Front of men&#039;s Basic Tee in black."
                                         class="h-full w-full object-cover object-center lg:h-full lg:w-full">
                                @endif
                            </div>
                            <div class="mt-4 flex justify-between">
                                <div>
                                    <h3 class="text-sm text-gray-700">
                                        <a href="#">
                                            {{ $product->name }}
                                        </a>
                                    </h3>
                                        <p class="mt-3 text-sm text-gray-500">
                                            @foreach($product->categories as $category)
                                                @php
                                                    $categoryName = json_decode($category->name, true);
                                                @endphp
                                                <span class="mb-5 inline-flex items-center rounded-md bg-purple-50 px-2 py-1 text-xs font-medium text-purple-700 ring-1 ring-inset ring-purple-700/10">{{$categoryName['en']}}</span>
                                            @endforeach
                                        </p>

                                </div>
                                <p class="text-sm font-medium text-gray-900"> {{ $product->price }}
                                    KZT</p>
                            </div>
                            {{$product->quantity}}x
                            <a href="{{ route('products.edit', $product) }}"
                               class="inline-flex items-center px-4 py-2 bg-gray-800 rounded-md font-semibold text-xs text-white uppercase tracking-widest">
                                Edit </a>
                            <a wire:click="deleteProduct({{ $product->id }})"
                               onclick="return confirm('Are you sure?') || event.stopImmediatePropagation()"
                               href="#"
                               class="inline-flex items-center px-4 py-2 bg-red-600 rounded-md font-semibold text-xs text-white uppercase tracking-widest">
                                Delete
                            </a>
                        </div>
                    @empty
                        <tr>
                            <td class="px-6 py-4 text-sm"
                                colspan="3">
                                No
                                products
                                were
                                found.
                            </td>
                        </tr>
                    @endforelse
                </div>
            </div>
        </div>
            {{ $products->links() }}
    </div>
</div>

