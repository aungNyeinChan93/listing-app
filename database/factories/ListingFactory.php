<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Listing>
 */
class ListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id'=>User::factory(),
            'title'=>fake()->sentence(),
            'description'=>fake()->paragraph(),
            'tags'=>fake()->randomElement(['php','javascript','vue','react','angular']),
            'email'=>fake()->email(),
            'link'=>fake()->url(),
            'image'=>fake()->imageUrl(),
            'approved'=>fake()->boolean(),
        ];
    }
}
