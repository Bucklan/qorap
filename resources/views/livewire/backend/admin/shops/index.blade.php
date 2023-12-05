<div>
    <section class="content-main">
        <div class="content-header">
            <div>
                <h2 class="content-title card-title">Shops</h2>
                <p>Brand and shop management</p>
            </div>
            <div>
                <a href="#" class="btn btn-primary"><i class="text-muted material-icons md-post_add"></i>Add New Brand</a>
            </div>
        </div>
        <div class="card mb-4">
            <header class="card-header">
                <div class="row gx-3">
                    <div class="col-lg-4 mb-lg-0 mb-15 me-auto">
                        <input type="text" placeholder="Search..." class="form-control" />
                    </div>
                    <div class="col-lg-2 col-6">
                        <div class="custom_select">
                            <select class="form-select select-nice">
                                <option selected>Categories</option>
                                <option>Technology</option>
                                <option>Fashion</option>
                                <option>Home Decor</option>
                                <option>Healthy</option>
                                <option>Travel</option>
                                <option>Auto-car</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-2 col-6">
                        <input type="date" class="form-control" name="" />
                    </div>
                </div>
            </header>
            <div class="card-body">
                <div class="row gx-3">
                    @foreach($shops as $shop)
                        <div class="col-xl-2 col-lg-3 col-md-4 col-6">
                            <figure class="card border-1">
                                <div class="card-header bg-white text-center">
                                    <img height="76" src="{{asset('assets-back/imgs/items/1.jpg')}}" class="img-fluid" alt="Logo" />
                                </div>
                                <figcaption class="card-body text-center">
                                    <h6 class="card-title m-0">
                                        {{$shop->name}}</h6>
                                    <a href="#">
                                        {{count($shop->products)}} items </a>
                                </figcaption>
                            </figure>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
</div>
