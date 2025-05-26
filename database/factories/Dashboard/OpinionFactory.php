<?php

namespace Database\Factories\Dashboard;

use App\Models\Dashboard\Opinion;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class OpinionFactory extends Factory
{
    protected $model = Opinion::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'title' => $this->faker->sentence(20, true),
            'short_title' => $this->faker->sentence(10, true),
            'cover_image' => $this->faker->imageUrl(800, 650, 'news', true, 'Cover'),
            'cover_image_description' => $this->faker->sentence(10, true),
            'first_description' => $this->faker->paragraph(15, true),
            'second_description' => $this->faker->paragraph(10, true),
            'other_image' => $this->faker->imageUrl(640, 320, 'news', true, 'Other'),
            'other_image_description' => $this->faker->sentence(10, true),
        ];
    }
}
