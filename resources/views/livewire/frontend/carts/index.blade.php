<div>
    <div class="container mb-80 mt-50">
        <div class="row">
            <div class="col-lg-8 mb-40">
                <h1 class="heading-2 mb-10">Your Cart</h1>
                <div class="d-flex justify-content-between">
                    <h6 class="text-body">There are <span class="text-brand">{{count($products)}}</span> products in your cart</h6>
                    <h6 class="text-body"><a wire:click="delete_all_cart" class="text-muted"><i class="fi-rs-trash mr-5"></i>Clear Cart</a></h6>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8">
                <div class="table-responsive shopping-summery">
                    <table class="table table-wishlist">
                        <thead>
                        <tr class="main-heading">
                            <th class="custome-checkbox start pl-30">
                                <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox11" value="">
                                <label class="form-check-label" for="exampleCheckbox11"></label>
                            </th>
                            <th scope="col" colspan="2">Product</th>
                            <th scope="col">Unit Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col" class="end">Remove</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $index => $product)
                            <tr>
                                <td class="custome-checkbox pl-30">
                                    <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox{{$index}}" value="">
                                    <label class="form-check-label" for="exampleCheckbox{{$index}}"></label>
                                </td>
                                <td class="image product-thumbnail"><img src="{{$product->getFirstMediaUrl('products')}}" alt="#"></td>
                                <td class="product-des product-name">
                                    <h6 class="mb-5"><a class="product-name mb-10 text-heading" href="#">{{$product->name}}</a></h6>
                                    <div class="product-rate-cover">
                                        <span class="font-small ml-5 text-muted">x{{$product->quantity}}</span>
                                    </div>
                                </td>
                                <td class="price" data-title="Price">
                                    <h4 class="text-body">{{$product->price}} KZT</h4>
                                </td>
                                <td class="text-center detail-info" data-title="Stock">
                                    <div class="detail-extralink mr-15">
                                        <div class="detail-qty border radius">
                                            <button href="#" class="qty-up" wire:click="incrementQuantity({{ $index }})"><i class="fi-rs-angle-small-up"></i></button>
                                            <input type="text" wire:model="items.{{$index}}.quantity"  class="qty-val" min="1">
                                            <button  class="qty-down"><i class="fi-rs-angle-small-down"></i></button>
                                        </div>
                                    </div>
                                </td>
                                <td class="action text-center" data-title="Remove"><a wire:click.prevent="deleteFromCart({{$product->id}})" class="text-body"><i class="fi-rs-trash"></i></a></td>
                            </tr>

                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="divider-2 mb-30"></div>
                <div class="cart-action d-flex justify-content-between">
                    <a class="btn " href="{{route('dashboard')}}"><i class="fi-rs-arrow-left mr-10"></i>Continue Shopping</a>
                    <a class="btn  mr-10 mb-sm-15" href="{{route('cart.index')}}"><i class="fi-rs-refresh mr-10"></i>Update Cart</a>
                </div>
                <div class="row mt-50">
                    <div class="col-lg-7">
                        <div class="calculate-shiping p-40 border-radius-15 border">
                            <h4 class="mb-10">Calculate Shipping</h4>
                            <p class="mb-30"><span class="font-lg text-muted">Flat rate:</span><strong class="text-brand">5%</strong></p>
                            <form class="field_form shipping_calculator">
                                <div class="form-row">
                                    <div class="form-group col-lg-12">
                                        <div class="custom_select">
                                            <select class="form-control select-active w-100">
                                                @foreach($cities as $city)
                                                    <option value="{{$city->id}}">{{$city->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row row">
                                    <div class="form-group col-lg-6">
                                        <input required="required" placeholder="State / Country" name="name" type="text">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <input required="required" placeholder="PostCode / ZIP" name="name" type="text">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-lg-4">
                <div class="border p-md-4 cart-totals ml-30">
                    <div class="table-responsive">
                        <table class="table no-border">
                            <tbody>
                            <tr>
                                <td class="cart_total_label">
                                    <h6 class="text-muted">Total</h6>
                                </td>
                                <td class="cart_total_amount">
                                    <h4 class="text-brand text-end">
                                        {{$total}} KZT</h4>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <a href="{{route('dashboard')}}" class="btn mb-20 w-100">Proceed To CheckOut<i class="fi-rs-sign-out ml-15"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('livewire:load', function () {
        Livewire.on('updateTotal', total => {
            document.querySelector('#total-element').innerText = `$${total}`;
        });
    });
</script>