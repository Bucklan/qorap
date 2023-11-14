
<div>
    @if($success)
        <span class="block mb-4 text-green-500">Product saved successfully.</span>
    @endif
    <form method="POST" wire:submit="save">
        <div>
            <label for="name" class="block font-medium text-sm text-gray-700">Title</label>
            <input id="name" wire:model="name"  class="block mt-1 w-full border-gray-300 rounded-md shadow-sm" type="text" />

            @error('name')
            <span class="mt-2 text-sm text-red-600">{{ $message }}</span>
            @enderror
        </div>

        <div class="mt-4">
            <label for="description" class="block font-medium text-sm text-gray-700">Body</label>
            <textarea id="description" wire:model="description" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm"></textarea>
            @error('description')
            <span class="mt-2 text-sm text-red-600">{{ $message }}</span>
            @enderror
        </div>

        <button class="mt-4 px-4 py-2 bg-gray-800 rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700">
            Save
        </button>
    </form>
</div>
