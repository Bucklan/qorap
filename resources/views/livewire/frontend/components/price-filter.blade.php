<div>
    <div class="sidebar-widget price_range range mb-30">
        <h5 class="section-title style-1 mb-30">
            Fill
            by
            price</h5>
        <div class="price-filter">
            <div class="price-filter-inner row">
                <div class="col-5">
                    <input type="number"
                           min="0"
                           wire:model.live="index.fromPrice"
                           placeholder="from">
                </div>
                <div class="col-1 mt-2">
                    <strong>-</strong>
                </div>
                <div class="col-5">
                    <input type="number"
                           min="0"
                           wire:model.live="index.toPrice"
                           placeholder="to">
                </div>
            </div>
        </div>
    </div>
</div>
