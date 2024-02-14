<?php

namespace Database\Factories;

use App\Models\MenuItem;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MenuItem>
 */
class MenuItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $ds = DIRECTORY_SEPARATOR;

        return [
            'title' => $this->faker->sentence,
            'subtitle' => $this->faker->sentence,
            'price' => $this->faker->randomFloat(2, 1, 100),
            'image' => MenuItem::getImageSaveLocation().$this->faker->image(
                dir: storage_path('app'.$ds.'public'.$ds.'uploads'.$ds.'posts'),
                width: 640,
                height: 480,
                category: null,
                fullPath: false,
                word: 'Test MenuItem'
            ),
        ];
    }
}
