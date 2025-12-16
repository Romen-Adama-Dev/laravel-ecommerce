<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::query()
            ->where('is_active', true)
            ->where('stock', '>', 0)
            ->select(['id', 'name', 'slug', 'price'])
            ->orderByDesc('id')
            ->paginate(12);

        return view('store.products.index', compact('products'));
    }

    public function show(string $slug)
    {
        $product = Product::query()
            ->where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        return view('store.products.show', compact('product'));
    }
}