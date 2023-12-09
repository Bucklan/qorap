<div>
    @php($type = \App\Enums\Product\Type::getDescription($product->type))
    <article class="itemlist">
        <div class="row align-items-center">
            <div class="col col-check flex-grow-0">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" />
                </div>
            </div>
            <div class="col-lg-4 col-sm-4 col-8 flex-grow-1 col-name">
                <a class="itemside" href="#">
                    <div class="left">
{{--                        https://tailwindui.com/img/ecommerce-images/product-page-01-related-product-01.jpg--}}
{{--                        {{asset('assets-back/imgs/items/1.jpg')}}--}}
                        <img src="{{asset('assets-back/imgs/items/1.jpg')}}" class="img-sm img-thumbnail" alt="Item" />
                    </div>
                    <div class="info">
                        <h6 class="mb-0">{{$product->name}}</h6>
                    </div>
                </a>
            </div>
            <div class="col-lg-2 col-sm-2 col-4 col-price"><span>{{($product->price)}} KZT</span></div>
            <div class="col-lg-1 col-sm-2 col-4 col-status">
                <span class="badge rounded-pill alert-{{$type=='active'?'success':'danger'}}">{{$type}}</span>
            </div>
            <div class="col-lg-2 col-sm-4 col-4 col-date">
                <span>{{ $product->created_at->format('d F Y') }}</span>
            </div>
            <div class="col-lg-2 col-sm-2 col-4 col-action text-end">
                <a href="#" class="btn btn-sm font-sm rounded btn-brand"> <i class="material-icons md-edit"></i> Edit </a>
                <form wire:model="deleteProduct">
                    <button class="btn btn-sm font-sm btn-light rounded">
                        <i class="material-icons md-delete_forever"></i>Delete </button>
                </form>
            </div>
        </div>
        <!-- row .// -->
    </article>

</div>
