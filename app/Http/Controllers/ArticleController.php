<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ArticleController extends Controller
{
    public function index(Request $request): View
    {
        $search = trim((string) $request->query('search', ''));
        $sort = (string) $request->query('sort', 'name_asc');

        $articles = Article::query()
            ->with('category')
            ->when($search !== '', function ($query) use ($search) {
                $query->where(function ($query) use ($search) {
                    $query->where('title', 'like', "%{$search}%")
                        ->orWhere('content', 'like', "%{$search}%");
                });
            });

        $articles = match ($sort) {
            'name_desc' => $articles->orderByDesc('title'),
            default => $articles->orderBy('title'),
        };

        return view('articles.index', [
            'articles' => $articles->paginate(10)->withQueryString(),
            'filters' => [
                'search' => $search,
                'sort' => $sort,
            ],
        ]);
    }

    public function show(string $slug): View
    {
        $article = Article::query()
            ->with(['category', 'comments' => fn ($query) => $query->latest()])
            ->where('slug', $slug)
            ->firstOrFail();

        return view('articles.show', compact('article'));
    }

    public function updateComment(Request $request, Comment $comment): RedirectResponse
    {
        $validated = $request->validate([
            'content' => ['required', 'string', 'min:3'],
        ]);

        $comment->update($validated);

        return redirect()
            ->route('articles.show', ['slug' => $comment->article->slug])
            ->with('success', 'Komentar berhasil diubah.');
    }

    public function destroyComment(Comment $comment): RedirectResponse
    {
        $slug = $comment->article->slug;

        $comment->delete();

        return redirect()
            ->route('articles.show', ['slug' => $slug])
            ->with('success', 'Komentar berhasil dihapus.');
    }
}
