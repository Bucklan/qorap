<?php
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('products.index', function (BreadcrumbTrail $trail) {
    $trail->push('Products', route('products.index'));
});

Breadcrumbs::for('products.show', function (BreadcrumbTrail $trail, \App\Models\Product $product) {
    $trail->parent('products.index');
    $trail->push($product->name, route('products.show', $product));
});

/*Breadcrumbs::for('products.edit', function (BreadcrumbTrail $trail,\App\Models\Product $product) {
    $trail->parent('products.show');

    $trail->push('Edit', route('products.edit', $product));
});*/

Breadcrumbs::for('shops.index',function (BreadcrumbTrail $trail) {
    $trail->push('Shops', route('shops.index'));
});

Breadcrumbs::for('shops.show', function (BreadcrumbTrail $trail, \App\Models\Shop $shop) {
    $trail->parent('shops.index');
    $trail->push($shop->name, route('shops.show', $shop));
});