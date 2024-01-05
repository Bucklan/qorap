<div>
    <h1>Shop Create</h1>

    <form wire:submit.prevent="save" enctype="multipart/form-data">
        <div class="col-lg-12">
            <div class="card mb-2">
                <div class="card-body">
                    <label for="shop_name"
                           class="form-label">Shop
                        Name</label>
                    <input wire:model="name"
                           type="text"
                           placeholder="Type here"
                           class="form-control"
                           id="shop_name"/>
                    <div class="card-error mt-2">
                        @error('name')
                        <span class="text-sm text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="card mb-2">
                <div class="card-body">
                    <label for="shop_phone"
                           class="form-label">Shop
                        Phone</label>
                    <input wire:model="phone"
                           type="text"
                           placeholder="Type here"
                           class="form-control"
                           id="shop_phone"/>
                    <div class="card-error mt-2">
                        @error('phone')
                        <span class="text-sm text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="card mb-2">
                <div class="card-body">
                    <label for="number_of_stores"
                           class="form-label">Shop
                        number_of_stores</label>
                    <input wire:model="number_of_stores"
                           type="number"
                           placeholder="Type here"
                           class="form-control"
                           id="number_of_stores"/>
                    <div class="card-error mt-2">
                        @error('number_of_stores')
                        <span class="text-sm text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="mb-4">
                <div class="card-body">
                    <label class="form-label">Cities</label>
                    <select class="form-select"
                            wire:model="city_id">
                        @foreach($cities as $city)
                            <option value="{{$city->id}}">{{$city->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="card mb-2">
                <div class="card-body">
                    <label for="address"
                           class="form-label">Shop
                        Address</label>
                    <input wire:model="address"
                           type="text"
                           placeholder="Type here"
                           class="form-control"
                           id="address"/>
                    <div class="card-error mt-2">
                        @error('address')
                        <span class="text-sm text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>

{{--            <div class="card mb-2">--}}
{{--                <div class="card-body">--}}
{{--                    <label for="social_link_facebook"--}}
{{--                           class="form-label">Shop--}}
{{--                        Social link facebook</label>--}}
{{--                    <input wire:model="social_link_facebook"--}}
{{--                           type="text"--}}
{{--                           placeholder="Type here"--}}
{{--                           class="form-control"--}}
{{--                           id="social_link_facebook"/>--}}
{{--                    <div class="card-error mt-2">--}}
{{--                        @error('social_link_facebook')--}}
{{--                        <span class="text-sm text-danger">{{ $message }}</span>--}}
{{--                        @enderror--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="card mb-2">--}}
{{--                <div class="card-body">--}}
{{--                    <label for="social_link_instagram"--}}
{{--                           class="form-label">Shop--}}
{{--                        Social link instagram</label>--}}
{{--                    <input wire:model="social_link_instagram"--}}
{{--                           type="text"--}}
{{--                           placeholder="Type here"--}}
{{--                           class="form-control"--}}
{{--                           id="social_link_instagram"/>--}}
{{--                    <div class="card-error mt-2">--}}
{{--                        @error('social_link_instagram')--}}
{{--                        <span class="text-sm text-danger">{{ $message }}</span>--}}
{{--                        @enderror--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="card mb-2">--}}
{{--                <div class="card-body">--}}
{{--                    <label for="social_link_twitter"--}}
{{--                           class="form-label">Shop--}}
{{--                        Social link twitter</label>--}}
{{--                    <input wire:model="social_link_twitter"--}}
{{--                           type="text"--}}
{{--                           placeholder="Type here"--}}
{{--                           class="form-control"--}}
{{--                           id="social_link_twitter"/>--}}
{{--                    <div class="card-error mt-2">--}}
{{--                        @error('social_link_twitter')--}}
{{--                        <span class="text-sm text-danger">{{ $message }}</span>--}}
{{--                        @enderror--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
            <div class="mb-4">
                <div class="card-body">
                <label class="form-label">Status</label>
                <select class="form-select"
                        wire:model="status">
                    @foreach($statusses as $type)
                        @php($name = \App\Enums\Shop\Status::getDescription($type))
                        <option value="{{$name}}">{{$name}}</option>
                    @endforeach
                </select>
                </div>
            </div>
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
                @error('image')
                <span class="text-sm text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
            <button class="btn btn-md rounded font-sm">
                Next
            </button>
            <div class="mb-4"></div>
        </div>
    </form>
</div>
