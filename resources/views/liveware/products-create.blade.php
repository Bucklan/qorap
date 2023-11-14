<div>
    <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
        <h2 class="text-2xl font-bold tracking-tight text-gray-900">Product Create</h2>

        <div class="mt-6 grid grid gap-x-10 gap-y-10 xl:gap-x-8">
            <form method="POST"
                  wire:submit="save">
                <div>
                    <label for="name"
                           class="block font-medium text-sm text-black-700">Name</label>
                    <input id="name"
                           class="block mt-1 w-full border-solid border-2 border-black-600 rounded-md shadow-sm"
                           type="text"
                           wire:model="name"/>
                    @error('name')
                    <span class="mt-2 text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mt-4">
                    <label for="description"
                           class="block font-medium text-sm text-gray-700">Description</label>
                    <textarea
                            id="description"
                            class="block mt-1 w-full  border-solid border-2 border-black-600 rounded-md shadow-sm"
                            wire:model="description"></textarea>
                    @error('description')
                    <span class="mt-2 text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mt-4">
                    <label for="category">Category</label>
                    <select wire:model="category_id"
                            id="category"
                            class="block mt-1 w-full  border-solid border-2 border-black-600 rounded-md shadow-sm"
                            name="category"
                            multiple>
                        @foreach($categories as $value => $category)
                            @php
                                $categoryName = json_decode($category, true)
                            @endphp
                            <option value="{{$value}}" >{{ $categoryName['en'] }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                    <span class="mt-2 text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>

                <button class="mt-4 px-4 py-2 bg-gray-800 rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700">
                    Save
                    Product
                </button>
            </form>
        </div>
    </div>
</div>
