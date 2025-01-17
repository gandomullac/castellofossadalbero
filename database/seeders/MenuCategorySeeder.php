<?php

namespace Database\Seeders;

use App\Models\MenuCategory;
use Illuminate\Database\Seeder;

class MenuCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['Menù carne', '#ffb800'],
            ['Menù pesce', '#ffb800'],
            ['Antipasti', '#ffb800'],
            ['Primi piatti', '#870f22'],
            ['Secondi piatti', '#235d72'],
            ['Menù bambini', '#12d885'],
            ['Contorni e dolci', '#9504c8'],
        ];

        $iteration = 0;
        foreach ($categories as $category) {
            $iteration++;
            MenuCategory::updateOrCreate(
                ['name' => $category[0]],
                ['color' => $category[1]],
                ['order' => $iteration],
            );
        }

    }
}
