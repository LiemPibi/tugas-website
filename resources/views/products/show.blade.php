<x-app-layout title="Product Detail">
    <h1 class="h3 mb-4">Product Detail</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $product['name'] }}</h5>
            <p class="card-text">{{ $product['description'] }}</p>
            <p class="card-text"><strong>Price:</strong> Rp {{ number_format($product['price'], 0, ',', '.') }}</p>
            <a href="{{ route('products.edit', ['id' => $product['id']]) }}" class="btn btn-warning">Edit</a>
            <a href="{{ route('products') }}" class="btn btn-secondary">Back to List</a>
        </div>
    </div>
</x-app-layout>
