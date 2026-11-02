<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        <div class="flex items-center justify-between">
            <h1 class="text-xl font-semibold text-dielca-dark">Productos</h1>
            <a href="{{ url('/') }}" class="text-sm text-dielca-mid hover:text-dielca-light">Inicio</a>
        </div>

        <div class="mt-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach ($products as $product)
                <a href="{{ route('products.show', $product->slug) }}" class="block rounded-lg border border-gray-200 bg-white p-4 hover:border-dielca-light focus:outline-none focus:ring-2 focus:ring-dielca-light">
                    <h3 class="font-semibold text-dielca-dark">{{ $product->name }}</h3>
                    <p class="mt-2 text-sm text-dielca-grayText">{{ number_format($product->price / 100, 2) }} €</p>
                </a>
            @endforeach
        </div>

        <div class="mb-6 flex flex-wrap gap-2">
            <a href="{{ route('products.index') }}"
            class="px-3 py-1 rounded border {{ request('category') ? '' : 'bg-gray-900 text-white' }}">
                Todas
            </a>

            @foreach($categories as $category)
                <a href="{{ route('products.index', ['category' => $category->slug]) }}"
                class="px-3 py-1 rounded border {{ request('category') === $category->slug ? 'bg-gray-900 text-white' : '' }}">
                    {{ $category->name }}
                </a>
            @endforeach
        </div>
    </div>
</x-app-layout>