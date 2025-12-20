<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = \App\Models\Product::query()
            ->where('is_active', true)
            ->where('stock', '>', 0)
            ->latest()
            ->paginate(12);

        return view('store.products.index', compact('products'));
    }

    public function show(string $slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();

        return view('store.products.show', compact('product'));
    }
    
}