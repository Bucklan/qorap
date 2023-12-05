<div>
    <section class="content-main">
        <div class="row">
            <div class="col-9">
                <div class="content-header">
                    <h2 class="content-title">Edit Product</h2>
                </div>
            </div>
            <form wire:submit="save" enctype="multipart/form-data">
                <div class="col-lg-6">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="mb-4">
                                <label for="product_title" class="form-label">Product title</label>
                                <input wire:model="name" type="text" placeholder="Type here" class="form-control" id="product_title" />
                                @error('name')
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
                                <textarea wire:model="description" placeholder="Type here" class="form-control" rows="4"></textarea>
                                @error('description')
                                <span class="text-sm text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="mb-4">
                                <label for="short_description" class="form-label">Short Description</label>
                                <input wire:model="short_description" type="text" placeholder="Type here" class="form-control" id="short_description" />
                                @error('short_description')
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
                                <input class="form-control" type="file" wire:model="images" multiple/>
                                @error('images')
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
                                <input wire:model="price" type="number" placeholder="Type here" class="form-control" />
                                @error('price')
                                <span class="text-sm text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label class="form-label">Quantity</label>
                                <input wire:model="quantity" type="number" placeholder="Type here" class="form-control" />
                                @error('quantity')
                                <span class="text-sm text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label class="form-label">Status</label>
                                <select class="form-select">
                                    @foreach(\App\Enums\Product\Type::getValues() as $type)
                                        <option value="{{$type}}" @if($type == $product->type) selected @endif>{{\App\Enums\Product\Type::getDescription($type)}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <h5 class="mb-3">Categories</h5>
                            @foreach($categories as $category)
                                @if(!$category->parent_id)
                                    <div class="form-check">
                                        <input class="form-check-input" @isset($product->categories[$loop->index]) checked @endisset wire:model="productCategories" value="{{$category->id}}" type="checkbox" id="category_{{$category->id}}" />
                                        <label for="category_{{$category->id}}">{{$category->name}}</label>
                                    </div>
                                    @foreach($category->children as $child)
                                        <div class="form-check ml-4">
                                            <input class="form-check-input" @isset($product->$categories[$loop->index]) checked @endisset wire:model="productCategories" value="{{$child->id}}" type="checkbox" id="category_{{$child->id}}" />
                                            <label for="category_{{$child->id}}">-- {{$child->name}}</label>
                                        </div>
                                    @endforeach
                                @endif
                            @endforeach
                            <hr>
                            <h5 class="mb-3">Colors</h5>
                            @foreach($colors as $color)
                                <div class="form-check">
                                    <input class="form-check-input" @isset($product->colors[$loop->index]) checked @endisset wire:model="productColors" type="checkbox" value="{{$color->id}}" id="{{$color->id}}" />
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
