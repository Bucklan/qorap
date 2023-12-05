<div>
    <section class="content-main">
        <div class="row">
            <div class="col-9">
                <div class="content-header">
                    <h2 class="content-title">Add New Product</h2>
                </div>
            </div>
            <form wire:submit="save" enctype="multipart/form-data">
            <div class="col-lg-6">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="mb-4">
                            <label for="product_title" class="form-label">Product title</label>
                            <input wire:model="form.name" type="text" placeholder="Type here" class="form-control" id="product_title" />
                        @error('form.name')
                            <span class="text-sm text-danger">{{ $message }}</span>
                        @enderror
                        </div>
                    </div>
                </div>
                <!-- card end// -->
                <div class="card mb-4">
                    <div class="card-body">
                        <div>
                            <label class="form-label">Description</label>
                            <textarea wire:model="form.description" placeholder="Type here" class="form-control" rows="4"></textarea>
                            @error('form.description')
                            <span class="text-sm text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="mb-4">
                            <label for="short_description" class="form-label">Short Description</label>
                            <input wire:model="form.short_description" type="text" placeholder="Type here" class="form-control" id="short_description" />
                            @error('form.short_description')
                            <span class="text-sm text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <!-- card end// -->
                <div class="card mb-4">
                    <div class="card-body">
                        <div>
                            <label class="form-label">Images</label>
                            <input class="form-control" type="file" wire:model="form.images" multiple/>
                            @error('form.images')
                            <span class="text-sm text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <!-- card end// -->
            </div>
            <div class="col-lg-3">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="mb-4">
                            <label class="form-label">Price</label>
                            <input wire:model="form.price" type="number" placeholder="Type here" class="form-control" />
                            @error('form.price')
                            <span class="text-sm text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Quantity</label>
                            <input wire:model="form.quantity" type="number" placeholder="Type here" class="form-control" />
                            @error('form.quantity')
                            <span class="text-sm text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Status</label>
                            <select class="form-select">
                                <option>Published</option>
                                <option>Draft</option>
                            </select>
                        </div>

                        <h5 class="mb-3">Categories</h5>
                        @foreach($categories as $category)
                            @if(!$category->parent_id)
                                <div class="form-check">
                                    <input class="form-check-input" wire:model="form.productCategories" value="{{$category->id}}" type="checkbox" id="category_{{$category->id}}" />
                                    <label for="category_{{$category->id}}">{{$category->name}}</label>
                                </div>
                                @foreach($category->children as $child)
                                    <div class="form-check ml-4">
                                        <input class="form-check-input" wire:model="form.productCategories" value="{{$child->id}}" type="checkbox" id="category_{{$child->id}}" />
                                        <label for="category_{{$child->id}}">-- {{$child->name}}</label>
                                    </div>
                                @endforeach
                            @endif
                        @endforeach
                        <hr>
                        <h5 class="mb-3">Colors</h5>
                        @foreach($colors as $color)
                            <div class="form-check">
                                <input class="form-check-input" wire:model="form.productColors" type="checkbox" value="{{$color->id}}" id="{{$color->id}}" />
                                <label class="form-check-label" for="{{$color->id}}">{{$color->name}}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
                <!-- card end// -->
            </div>
                <div>
                    <button class="btn btn-md rounded font-sm hover-up">Publich</button>
                </div>
            </form>
        </div>
    </section>

</div>
