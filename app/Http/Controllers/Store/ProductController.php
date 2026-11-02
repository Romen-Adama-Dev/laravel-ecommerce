<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductController extends Controller
{
    public function show(string $slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();

        return view('store.products.show', compact('product'));
    }

    public function index()
    {
        $products = \App\Models\Product::query()
            ->select(['id', 'name', 'slug', 'price', 'category_id'])
            ->with('category:id,name,slug')
            ->where('is_active', true)
            ->where('stock', '>', 0)
            ->when(request('category'), fn ($q, $slug) => $q->whereHas('category', fn ($qq) => $qq->where('slug', $slug)))
            ->orderByDesc('id')
            ->paginate(12)
            ->withQueryString();

        $categories = \App\Models\Category::query()
            ->select(['id', 'name', 'slug'])
            ->orderBy('name')
            ->get();

        return view('store.products.index', compact('products', 'categories'));
    }
    
}