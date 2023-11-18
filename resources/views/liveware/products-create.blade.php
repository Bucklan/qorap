<div>
    <div class="mx-auto ml-36 mt-10">
        <a href="{{ url('/products') }}" class="mt-4 px-4 py-2 bg-gray-800 rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700"> <<< Back </a>
    </div>

    <div class="mx-auto  px-4 py-16 sm:px-6 sm:py-10 lg:max-w-7xl lg:px-6">
        <h2 class="text-2xl font-bold tracking-tight text-gray-900">
            Product
            Create</h2>

        <div class="mt-6 flex flex-col">
            <form method="POST"
                  wire:submit="save">
                <div class="columns-md">
                    <label for="name"
                           class=" font-medium text-sm text-black-700">Name</label>
                    <input id="name"
                           class="mt-1 py-2 w-full border-solid border-2 border-black-600 rounded-md shadow-sm"
                           type="text"
                           wire:model="form.name" placeholder="Insert product name"/>
                </div>
                @error('form.name')
                <span class="mt-2 text-sm text-red-600">{{ $message }}</span>
                @enderror
                <div class="mt-4 columns-md">
                    <label for="description"
                           class="font-medium text-sm text-gray-700">Description</label>
                    <textarea id="description"
                            class="mt-1 w-full  border-solid border-2 border-black-600 rounded-md shadow-sm"
                            wire:model="form.description" placeholder="Insert product description"></textarea>
                </div>
                @error('form.description')
                <span class="mt-2 text-sm text-red-600">{{ $message }}</span>
                @enderror
                <div class="columns-3xs mt-4">
                    <label for="price"
                           class=" font-medium text-sm text-black-700">Price</label>
                    <input id="price"
                           class="mt-1 w-full py-1 border-solid border-2 border-black-600 rounded-md shadow-sm"
                           type="number"
                           wire:model="form.price" placeholder="0.00 KZT"/>
                </div>
                @error('form.price')
                <span class="mt-2 text-sm text-red-600">{{ $message }}</span>
                @enderror
                <div class="columns-3xs mt-4">
                    <label for="price"
                           class=" font-medium text-sm text-black-700">Quantity</label>
                    <input id="quantity"
                           class="mt-1 w-full py-1 border-solid border-2 border-black-600 rounded-md shadow-sm"
                           type="number"
                           wire:model="form.quantity" placeholder="Insert product quantity"/>
                </div>
                @error('form.quantity')
                <span class="mt-2 text-sm text-red-600">{{ $message }}</span>
                @enderror
                <div class="mt-4 columns-md">
                    <label for="category ">Category</label>
                    <select multiple
                            wire:model="form.productCategories"
                            name="category"
                            id="category"
                            class="mt-1 w-full b border-solid border-2 border-black-600 rounded-md shadow-sm">
                        @foreach($categories as $value => $category)
                            @php
                                $categoryName = json_decode($category, true)
                            @endphp
                            <option value="{{$value}}">{{ $categoryName['en'] }}</option>
                        @endforeach
                    </select>
                </div>
                @error('form.productCategories')
                <span class="mt-2 text-sm text-red-600">{{ $message }}</span>
                @enderror

                <div class="mt-4 columns-md">
                    <label for="images" class="form-label">Image Product</label>
                    <input type="file" multiple="multiple" class="mt-1 w-full b border-solid border-2 border-black-600 rounded-md shadow-sm" id="images" wire:model="form.images">
                </div>
                @error('images')
                <div class="alert alert-danger mt-2">{{$message}}</div>
                @enderror
                <button class="mt-4 px-4 py-2 bg-gray-800 rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700">
                    Save
                    Product
                </button>
            </form>
        </div>
    </div>
</div>
