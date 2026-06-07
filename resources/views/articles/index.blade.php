<x-app-layout title="Articles List">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-0">Articles</h1>
            <p class="text-muted mb-0">Cari artikel berdasarkan nama atau isi konten, lalu urutkan hasilnya.</p>
        </div>
        <a href="{{ route('home') }}" class="btn btn-outline-secondary">Home</a>
    </div>

    <form method="GET" action="{{ route('articles') }}" class="card card-body mb-4">
        <div class="row g-3 align-items-end">
            <div class="col-md-7">
                <label for="search" class="form-label">Cari nama/konten artikel</label>
                <input
                    type="text"
                    id="search"
                    name="search"
                    class="form-control"
                    value="{{ $filters['search'] }}"
                    placeholder="Contoh: cari sesuatu"
                >
            </div>
            <div class="col-md-3">
                <label for="sort" class="form-label">Urutkan nama</label>
                <select id="sort" name="sort" class="form-select">
                    <option value="name_asc" @selected($filters['sort'] === 'name_asc')>Nama A-Z</option>
                    <option value="name_desc" @selected($filters['sort'] === 'name_desc')>Nama Z-A</option>
                </select>
            </div>
            <div class="col-md-2 d-grid">
                <button type="submit" class="btn btn-success">Cari</button>
            </div>
        </div>
    </form>

    <div class="card">
        <div class="card-body p-0">
            <table class="table table-striped mb-0 align-middle">
                <thead>
                    <tr>
                        <th>Category</th>
                        <th>Name</th>
                        <th>Content</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($articles as $article)
                        <tr>
                            <td><span class="badge text-bg-secondary">{{ $article->category->name }}</span></td>
                            <td>{{ $article->title }}</td>
                            <td>{{ Str::limit($article->content, 120) }}</td>
                            <td>
                                <a href="{{ route('articles.show', ['slug' => $article->slug]) }}" class="btn btn-sm btn-info">Show</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center py-4">Artikel tidak ditemukan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-3">
        {{ $articles->links() }}
    </div>
</x-app-layout>
