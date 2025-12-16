<x-app-layout>
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        <a href="{{ route('products.index') }}" class="text-sm text-dielca-mid hover:text-dielca-light">Volver</a>

        <div class="mt-4 rounded-lg border border-gray-200 bg-white p-6">
            <h1 class="text-2xl font-semibold text-dielca-dark">{{ $product->name }}</h1>

            @if ($product->description)
                <p class="mt-4 text-sm text-dielca-grayText">{{ $product->description }}</p>
            @endif

            <div class="mt-6 flex items-center justify-between">
                <p class="text-lg font-semibold text-dielca-dark">{{ number_format($product->price / 100, 2) }} €</p>
                <span class="inline-flex items-center rounded-full bg-dielca-neutralBg px-3 py-1 text-xs font-medium text-dielca-dark">
                    Stock: {{ $product->stock }}
                </span>
            </div>
        </div>
    </div>
</x-app-layout>