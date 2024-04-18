<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

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
    public function definition(): array
    {
        return [
            'title' => fake()->bs(),
            'body' => fake()->realTextBetween($minNbChars = 500, $maxNbChars = 2000),
            'img_path' => function () {
                $absolutePath = fake()->image(storage_path('app/public/images'), 640, 480, 'cats', true);

                return str_replace(storage_path('app/public/'), '', $absolutePath);
            },
            'published_at' => fake()->dateTimeBetween('-2 months', '+ 1 month'),
            'user_id' => User::get()->random()->id,
        ];
    }
}
