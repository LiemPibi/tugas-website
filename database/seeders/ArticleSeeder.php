<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\Comment;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ArticleSeeder extends Seeder
{
    public function run(): void
    {
        $categories = collect(['Teknologi', 'Pendidikan', 'Gaya Hidup'])
            ->map(fn (string $name) => ArticleCategory::query()->firstOrCreate(
                ['slug' => Str::slug($name)],
                ['name' => $name]
            ));

        Article::factory()
            ->count(30)
            ->state(fn () => [
                'article_category_id' => $categories->random()->id,
            ])
            ->create()
            ->each(function (Article $article): void {
                Comment::factory()
                    ->count(fake()->numberBetween(10, 20))
                    ->create([
                        'article_id' => $article->id,
                    ]);
            });
    }
}
