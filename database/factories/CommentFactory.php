<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => fake()->word,
            'body' => fake()->text($maxNbChars = 30),
            'rating' => mt_rand(1, 5),
            'snack_id' => mt_rand(1, 100),
            'user_id' => mt_rand(1,3),
        ];
    }
}
