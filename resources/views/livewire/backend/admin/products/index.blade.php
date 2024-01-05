<div>
    <section
            class="content-main">
        <div class="content-header">
            <div>
                <h2 class="content-title card-title">
                    Products
                    List</h2>
            </div>
            <div>
                <a href="#"
                   class="btn btn-light rounded font-md">Import</a>
                <a href="{{route('admin.products.create')}}"
                   class="btn btn-primary btn-sm rounded">Create
                    new</a>
            </div>
        </div>
        <div class="card mb-4">
            <header class="card-header">
                <div class="row align-items-center">
                    <div class="col col-check flex-grow-0">
                        <div class="form-check ms-2">
                            <input class="form-check-input"
                                   type="checkbox"
                                   value=""/>
                        </div>
                    </div>
                    <div class="col-md-3 col-12 me-auto mb-md-0 mb-3">
                        <select class="form-select">
                            <option selected>
                                All
                                category
                            </option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                                @include('livewire.backend.components.child_category', ['child_category' => $category])
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2 col-6">
                        <input type="date"
                               value="02.05.2021"
                               class="form-control"/>
                    </div>
                    <div class="col-md-2 col-6">
                        <select class="form-select">
                            <option selected>
                                Status
                            </option>
                            <option>
                                Active
                            </option>
                            <option>
                                Disabled
                            </option>
                            <option>
                                Show
                                all
                            </option>
                        </select>
                    </div>
                </div>
            </header>
            <!-- card-header end// -->
            <div class="card-body">
                @forelse($products as $product)
                    <livewire:backend.components.product-item
                            :$product
                            :key="$product->id"/>
                @empty
                    <p class="text-center">No products found</p>
                @endforelse

                {{--                {!! $products->links() !!}--}}
            </div>
            <!-- card-body end// -->
        </div>
        <!-- card end// -->
        <div class="pagination-area mt-30 mb-50">
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-start">
                    <li class="page-item active">
                        <a class="page-link"
                           href="#">01</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link"
                           href="#">02</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link"
                           href="#">03</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link dot"
                           href="#">...</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link"
                           href="#">16</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link"
                           href="#"><i
                                    class="material-icons md-chevron_right"></i></a>
                    </li>
                </ul>
            </nav>
        </div>
    </section>
</div>
