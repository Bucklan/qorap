<div>
    <div class="space-y-6">
        <div class="space-x-8">
            <input type="search" id="search" placeholder="Search...">

            <select name="category">
                <option value="0">-- CHOOSE CATEGORY --</option>
                @foreach($categories as $id => $category)
                    <option value="{{ $id }}">{{ $category }}</option>
                @endforeach
            </select>
        </div>
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
                                        <span aria-hidden="true" class="absolute inset-0"></span>
                                        {{ $product->name }}
                                    </a>
                                </h3>
{{--                                @dd($product->categories)--}}
                                <p class="mt-1 text-sm text-gray-500">
                                @foreach($product->categories as $category)
                                    @php
                                        $categoryName = json_decode($category->name, true);
//                                        $currentLanguage = App::getLocale();
                                    @endphp

                                    <p>{{ $categoryName['en'] }}</p>
                                    @endforeach</p>
                            </div>
                            <p class="text-sm font-medium text-gray-900"> {{ $product->name }} KZT</p>
                        </div>
                    </div>
                    @empty
                        <tr>
                            <td class="px-6 py-4 text-sm" colspan="3">
                                No products were found.
                            </td>
                        </tr>
                    @endforelse
                    <!-- More products... -->
                </div>
            </div>
        </div>
    </div>
    {{ $products->links() }}
</div>
