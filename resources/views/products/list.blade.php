<x-app-layout title="Products List">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0">Products</h1>
        <a href="{{ route('products.create') }}" class="btn btn-primary">Add new product</a>
    </div>

    <div class="card">
        <div class="card-body p-0">
            <table class="table table-striped mb-0">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{ $product['id'] }}</td>
                        <td>{{ $product['name'] }}</td>
                        <td>{{ $product['description'] }}</td>
                        <td>Rp {{ number_format($product['price'], 0, ',', '.') }}</td>
                        <td>
                            <a href="{{ route('products.show', ['id' => $product['id']]) }}" class="btn btn-sm btn-info">Show</a>
                            <a href="{{ route('products.edit', ['id' => $product['id']]) }}" class="btn btn-sm btn-warning">Edit</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
