<?php

namespace Database\Factories;

use App\Models\ArticleCategory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    public function definition(): array
    {
        $title = fake()->unique()->sentence(5);

        return [
            'article_category_id' => ArticleCategory::query()->inRandomOrder()->value('id'),
            'title' => $title,
            'slug' => Str::slug($title) . '-' . fake()->unique()->numberBetween(1000, 9999),
            'content' => fake()->paragraphs(fake()->numberBetween(3, 6), true),
        ];
    }
}
