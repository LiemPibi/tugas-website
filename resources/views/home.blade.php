<x-app-layout title="Home">
    <div class="p-5 mb-4 bg-primary text-white rounded-3">
        <div class="container-fluid py-3">
            <h1 class="display-5 fw-bold">Welcome to Tugas Article App</h1>
            <p class="col-md-8 fs-5">Kelola artikel dengan fitur pencarian, kategori, komentar, dan pengurutan secara cepat.</p>
            <a href="{{ route('articles') }}" class="btn btn-light btn-lg">Lihat Artikel</a>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-md-4">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">3 Kategori Artikel</h5>
                    <p class="card-text">Teknologi, Pendidikan, dan Gaya Hidup.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">30 Data Artikel</h5>
                    <p class="card-text">Data dibuat melalui seeder, factory, dan Faker.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">Smart Search & Filter</h5>
                    <p class="card-text">Cari berdasar nama/konten, urutkan A-Z atau Z-A, serta kelola komentar.</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
