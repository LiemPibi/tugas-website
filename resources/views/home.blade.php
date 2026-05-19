<x-app-layout title="Home">
    <div class="p-5 mb-4 bg-primary text-white rounded-3">
        <div class="container-fluid py-3">
            <h1 class="display-5 fw-bold">Welcome to Tugas Product App</h1>
            <p class="col-md-8 fs-5">Kelola produk dengan fitur pencarian, filter harga, kategori, dan pengurutan secara cepat.</p>
            <a href="{{ route('products') }}" class="btn btn-light btn-lg">Lihat Produk</a>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-md-4">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">3 Kategori Produk</h5>
                    <p class="card-text">Electronics, Fashion, Home & Living.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">30 Data Produk</h5>
                    <p class="card-text">Data siap tampil langsung tanpa setup database tambahan.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">Smart Search & Filter</h5>
                    <p class="card-text">Cari berdasar nama/deskripsi, filter range harga, dan urutkan hasil.</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
