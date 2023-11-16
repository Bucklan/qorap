<div>
    <div class="space-y-6">
        <div class="flex justify-between">
        <div class="space-x-8">
            <input wire:model.live="searchQuery" type="search" id="search" placeholder="Search...">

            <select wire:model.live="searchCategory" name="category">
                <option value="0">-- CHOOSE CATEGORY --</option>
                @foreach($categories as $value => $category)
                    @php
                        $categoryName = json_decode($category, true)
                    @endphp
                    <option value="{{$value}}">{{ $categoryName['en'] }}</option>
                @endforeach
            </select>
        </div>
            <a wire:navigate href="{{ route('products.create') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 rounded-md font-semibold text-xs text-white uppercase tracking-widest">
                Add new product
            </a>
        </div>
        <div class="text-red-600" wire:loading>Loading...</div>
        <div class="bg-white">
            <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
                <h2 class="text-2xl font-bold tracking-tight text-gray-900">Products</h2>

                <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
                    @forelse($products as $product)
                    <div class="group relative">
                        <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md bg-gray-200 lg:aspect-none group-hover:opacity-75 lg:h-80">
                            <img src="https://tailwindui.com/img/ecommerce-images/product-page-01-related-product-01.jpg" alt="Front of men&#039;s Basic Tee in black." class="h-full w-full object-cover object-center lg:h-full lg:w-full">
                        </div>
                        <div class="mt-4 flex justify-between">
                            <div>
                                <h3 class="text-sm text-gray-700">
                                    <a href="#">
                                        {{ $product->name }}
                                    </a>
                                </h3>

                                <p class="mt-1 text-sm text-gray-500">
                                        @foreach($product->categories as $category)
                                            @php
                                                $categoryName = json_decode($category->name, true);
                                            @endphp

                                            <p>{{ $categoryName['en'] }}</p>
                                        @endforeach
                                </p>
                            </div>
                            <p class="text-sm font-medium text-gray-900"> {{ $product->price }} KZT</p>
                        </div>
                        <a href="{{ route('products.edit', $product) }}" class="inline-flex items-center px-4 py-2 bg-gray-800 rounded-md font-semibold text-xs text-white uppercase tracking-widest">
                            Edit </a>
                        <a wire:click="deleteProduct({{ $product->id }})" onclick="return confirm('Are you sure?') || event.stopImmediatePropagation()" href="#"
                           class="inline-flex items-center px-4 py-2 bg-red-600 rounded-md font-semibold text-xs text-white uppercase tracking-widest">
                            Delete
                        </a>
                    </div>
                    @empty
                        <tr>
                            <td class="px-6 py-4 text-sm" colspan="3">
                                No products were found.
                            </td>
                        </tr>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
    {{ $products->links() }}
</div>
