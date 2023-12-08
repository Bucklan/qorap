<div>

    <section
            class="content-main">
        <div class="row">
            <div class="col-9">
                <div class="content-header">
                    <h2 class="content-title">
                        Add
                        New
                        Product</h2>
                </div>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row gx-5">
                            <aside class="col-lg-3 border-end">
                                <nav class="nav nav-pills flex-column mb-4">
                                    @foreach ($steps as $step)
                                        <a class="nav-link {{ $currentStep === $step['index'] ? 'active' : '' }}"
                                           wire:click="stepPage({{$step['index']}})">{{ $step['title'] }}</a>
                                    @endforeach
                                </nav>
                            </aside>
                            <div class="col-lg-9">
                                <section
                                        class="content-body p-xl-4">
                                    @if ($currentStep === 0)
                                        <form wire:submit.prevent="submitStep">
                                            <div class="col-lg-12">
                                                <div class="card mb-2">
                                                    <div class="card-body">
                                                        <label for="product_title"
                                                               class="form-label">Product
                                                            title</label>
                                                        <input wire:model="name"
                                                               type="text"
                                                               placeholder="Type here"
                                                               class="form-control"
                                                               id="product_title"/>
                                                        <div class="card-error mt-2">
                                                            @error('name')
                                                            <span class="text-sm text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- card end// -->
                                                <div class="card mb-4">
                                                    <div class="card-body">

                                                        <label class="form-label">Description</label>
                                                        <textarea
                                                                wire:model="description"
                                                                placeholder="Type here"
                                                                class="form-control"
                                                                rows="4"></textarea>
                                                        <div class="card-error mt-2">
                                                            @error('description')
                                                            <span class="text-sm text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card mb-4">
                                                    <div class="card-body">
                                                        <label for="short_description"
                                                               class="form-label">Short
                                                            Description</label>
                                                        <textarea
                                                                wire:model="short_description"
                                                                placeholder="Type here"
                                                                class="form-control"></textarea>
                                                        <div class="card-error mt-2">
                                                            @error('short_description')
                                                            <span class="text-sm text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <button class="btn btn-md rounded font-sm hover-up">
                                                    Next
                                                </button>
                                            </div>
                                        </form>
                                    @elseif ($currentStep === 1)
                                        <form wire:submit.prevent="submitStepCategories">
                                            <div class="col-lg-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="mb-4">
                                                            <label class="form-label">Price</label>
                                                            <input wire:model="price"
                                                                   type="number"
                                                                   placeholder="Type here"
                                                                   class="form-control"/>
                                                            @error('price')
                                                            <span class="text-sm text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="mb-4">
                                                            <label class="form-label">Quantity</label>
                                                            <input wire:model="quantity"
                                                                   type="number"
                                                                   placeholder="Type here"
                                                                   class="form-control"/>
                                                            @error('quantity')
                                                            <span class="text-sm text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="mb-4">
                                                            <label class="form-label">Status</label>
                                                            <select class="form-select"
                                                                    wire:model="type">
                                                                @foreach(\App\Enums\Product\Type::getValues() as $type)
                                                                    <option value="{{$type}}">{{\App\Enums\Product\Type::getDescription($type)}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="row mb-4">
                                                            <label class="col-lg-3 col-form-label">Category</label>
                                                            <small class="text-muted font-sm mb-10">Multiselect:
                                                                Cmd+click</small>
                                                            <select multiple
                                                                    size="4"
                                                                    class="form-control select-multiple"
                                                                    wire:model="productCategories">
                                                                @foreach($this->categories as $category)
                                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                                    @foreach($category->children as $child)
                                                                        @include('livewire.backend.components.child_category', ['child_category' => $child])
                                                                    @endforeach
                                                                @endforeach
                                                            </select>
                                                            @error('productCategories')
                                                            <span class="text-sm text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>

                                                        <h5 class="mb-3">
                                                            Colors</h5>
                                                        @foreach($colors as $color)
                                                            <div class="form-check">
                                                                <input class="form-check-input"
                                                                       wire:model="productColors.{{ $color->id }}"
                                                                       type="checkbox"
                                                                       value="{{$color->id}}"
                                                                       id="color_{{$color->id}}"/>
                                                                <label class="form-check-label"
                                                                       for="color_{{$color->id}}">{{$color->name}}</label>
                                                            </div>
                                                        @endforeach

                                                        @error('productColors')
                                                        <span class="text-sm text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <!-- card end// -->
                                            </div>

                                            <div>
                                                <button class="btn btn-md rounded font-sm hover-up">
                                                    Next
                                                </button>
                                            </div>
                                        </form>
                                    @else
                                        <form wire:submit.prevent="submitStepImages" enctype="multipart/form-data">
                                            <div class="col-lg-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="mb-4">
                                                            <div class="card-header">
                                                                <h4>
                                                                    Media</h4>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="input-upload">
                                                                    <img src="{{asset('assets-back/imgs/theme/upload.svg')}}"
                                                                         alt=""/>
                                                                    <input wire:model="images"
                                                                           class="form-control"
                                                                           type="file"
                                                                           multiple/>
                                                                </div>
                                                                @error('images')
                                                                <span class="text-sm text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <button class="btn btn-md rounded font-sm hover-up">
                                                    Next
                                                </button>
                                            </div>
                                        </form>
                                    @endif
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
