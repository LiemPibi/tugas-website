<x-app-layout title="Article Detail">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-0">{{ $article->title }}</h1>
            <p class="text-muted mb-0">Kategori: {{ $article->category->name }}</p>
        </div>
        <a href="{{ route('articles') }}" class="btn btn-secondary">Back to List</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <article class="card mb-4">
        <div class="card-body">
            <p class="card-text">{{ $article->content }}</p>
        </div>
    </article>

    <section class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2 class="h5 mb-0">Komentar</h2>
            <span class="badge text-bg-primary">{{ $article->comments->count() }}</span>
        </div>
        <div class="card-body">
            @forelse($article->comments as $comment)
                <div class="border-bottom pb-3 mb-3">
                    <div class="d-flex justify-content-between gap-3">
                        <div>
                            <strong>{{ $comment->name }}</strong>
                            <span class="text-muted small">({{ $comment->email }})</span>
                            <div class="text-muted small">
                                Dibuat: {{ $comment->created_at->format('d M Y H:i') }}
                                @if($comment->updated_at->ne($comment->created_at))
                                    <span class="ms-2">Diubah: {{ $comment->updated_at->format('d M Y H:i') }}</span>
                                @endif
                            </div>
                        </div>
                        <form method="POST" action="{{ route('articles.comments.destroy', ['comment' => $comment->id]) }}" onsubmit="return confirm('Hapus komentar ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger">Hapus</button>
                        </form>
                    </div>

                    <form method="POST" action="{{ route('articles.comments.update', ['comment' => $comment->id]) }}" class="mt-3">
                        @csrf
                        @method('PATCH')
                        <label for="comment-{{ $comment->id }}" class="form-label">Ubah komentar</label>
                        <textarea id="comment-{{ $comment->id }}" name="content" class="form-control mb-2" rows="3" required>{{ old('content', $comment->content) }}</textarea>
                        <button type="submit" class="btn btn-sm btn-warning">Simpan Perubahan</button>
                    </form>
                </div>
            @empty
                <p class="text-muted mb-0">Belum ada komentar.</p>
            @endforelse
        </div>
    </section>
</x-app-layout>
