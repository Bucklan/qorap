<div>
    <div class="sidebar-widget widget-category-2 mb-30">
        <h5 class="section-title style-1 mb-30">Category</h5>
        <div class="custome-checkbox mr-80" >
            @foreach($categories as $category)
                <input class="form-check-input" type="checkbox"
                       wire:model="index.searchCategory"
                       id="category_{{ $category->id }}"
                       value="{{ $category->id }}"
                        {{--{{ in_array($category?->id, $index?->searchCategory) ? 'checked' : '' }}--}} />
                <label class="form-check-label"
                       for="category_{{ $category->id }}">
                    <span>{{ $category->name }} ({{ count($category->products) }})</span>
                </label>
                <br/>
            @endforeach
        </div>
    </div>
</div>