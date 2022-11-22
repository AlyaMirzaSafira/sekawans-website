<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Ramsey\Uuid\Type\Integer;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => fake()->numberBetween(1, 10),
            'title' => fake()->realTextBetween(10, 20),
            'img' => fake()->imageUrl(600, 400, fake()->randomElement(['virus', 'activity', 'article']), true),
            'contents' => fake()->realTextBetween(5000, 10000),
            'category_id' => fake()->numberBetween(1, 3),
        ];
    }
}
