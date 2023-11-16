<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Livewire\Livewire;

class ProductController extends Controller
{
    public function index(): View
    {
        $products = Product::all();

        return view('products.index', compact('products'));
    }

    public function create(): View
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Product $product)
    {
        //
    }

    public function edit(Product $product)
    {

        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        //
    }

    public function destroy(Product $product)
    {
        //
    }
}
