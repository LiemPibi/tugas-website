<x-app-layout title="Products List">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-0">Products</h1>
            <p class="text-muted mb-0">Temukan produk terbaik berdasarkan nama, deskripsi, dan harga.</p>
        </div>
        <a href="{{ route('products.create') }}" class="btn btn-primary">Add new product</a>
    </div>

    <form method="GET" action="{{ route('products') }}" class="card card-body mb-4">
        <div class="row g-3 align-items-end">
            <div class="col-md-4">
                <label for="search" class="form-label">Cari nama/deskripsi</label>
                <input type="text" id="search" name="search" class="form-control" value="{{ $filters['search'] }}" placeholder="Contoh: smart atau kualitas">
            </div>
            <div class="col-md-2">
                <label for="min_price" class="form-label">Harga Min</label>
                <input type="number" id="min_price" name="min_price" class="form-control" value="{{ $filters['min_price'] }}" min="0">
            </div>
            <div class="col-md-2">
                <label for="max_price" class="form-label">Harga Max</label>
                <input type="number" id="max_price" name="max_price" class="form-control" value="{{ $filters['max_price'] }}" min="0">
            </div>
            <div class="col-md-3">
                <label for="sort" class="form-label">Urutkan</label>
                <select id="sort" name="sort" class="form-select">
                    <option value="name_asc" @selected($filters['sort'] === 'name_asc')>Nama A-Z</option>
                    <option value="name_desc" @selected($filters['sort'] === 'name_desc')>Nama Z-A</option>
                    <option value="price_asc" @selected($filters['sort'] === 'price_asc')>Harga Termurah</option>
                    <option value="price_desc" @selected($filters['sort'] === 'price_desc')>Harga Termahal</option>
                </select>
            </div>
            <div class="col-md-1 d-grid">
                <button type="submit" class="btn btn-success">Go</button>
            </div>
        </div>
    </form>

    <div class="card">
        <div class="card-body p-0">
            <table class="table table-striped mb-0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Category</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($products as $product)
                        <tr>
                            <td>{{ $product['id'] }}</td>
                            <td><span class="badge text-bg-secondary">{{ $product['category'] }}</span></td>
                            <td>{{ $product['name'] }}</td>
                            <td>{{ $product['description'] }}</td>
                            <td>Rp {{ number_format($product['price'], 0, ',', '.') }}</td>
                            <td>
                                <a href="{{ route('products.show', ['id' => $product['id']]) }}" class="btn btn-sm btn-info">Show</a>
                                <a href="{{ route('products.edit', ['id' => $product['id']]) }}" class="btn btn-sm btn-warning">Edit</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-4">Produk tidak ditemukan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
