<x-app-layout title="Product Form">
    <h1 class="h3 mb-4">Product Form</h1>

    <form action="{{ $formAction }}" method="POST" class="card card-body">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input
                type="text"
                id="name"
                name="name"
                class="form-control"
                value="{{ old('name', $product['name'] ?? '') }}"
                required
            >
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea
                id="description"
                name="description"
                class="form-control"
                rows="4"
                required
            >{{ old('description', $product['description'] ?? '') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input
                type="number"
                id="price"
                name="price"
                class="form-control"
                value="{{ old('price', $product['price'] ?? '') }}"
                min="0"
                required
            >
        </div>

        <button type="submit" class="btn btn-success">{{ $submitText }}</button>
    </form>
</x-app-layout>
