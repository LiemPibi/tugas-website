<?php

namespace Database\Factories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    public function definition(): array
    {
        return [
            'article_id' => Article::query()->inRandomOrder()->value('id'),
            'name' => fake()->name(),
            'email' => fake()->safeEmail(),
            'content' => fake()->paragraph(fake()->numberBetween(2, 5)),
        ];
    }
}
