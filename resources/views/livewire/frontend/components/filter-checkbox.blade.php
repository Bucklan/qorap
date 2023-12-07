<div>
    <div class="sidebar-widget widget-category-2 mb-30">
        <h5 class="section-title style-1 mb-30">
            {{$nameElement}}</h5>
        <div class="custome-checkbox mr-80" >
            @foreach($elements as $element)
                <input class="form-check-input" type="checkbox"
                       wire:model="{{$searchModel}}"
                       id="element_{{ $element->id }}"
                       value="{{ $element->id }}"
                        {{ in_array($element->id, $searchElement) ? 'checked' : '' }} />
                <label class="form-check-label"
                       for="element_{{ $element->id }}">
                    <span>{{ $element->name }} ({{$element->products_count }})</span>
                </label>
                <br/>
            @endforeach
        </div>
    </div>
</div>