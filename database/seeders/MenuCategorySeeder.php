<?php

namespace Database\Seeders;

use App\Models\MenuCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
            ['Primi piatti', '#870f22'],
            ['Secondi piatti', '#235d72'],
            ['Menù bambini', '#12d885'],
            ['Contorni e dolci', '#9504c8'],
        ];

        foreach($categories as $category){
            MenuCategory::updateOrCreate([
                'name' => $category[0],
                'color' => $category[1],    
                'order' => MenuCategory::count() + 1,
            ]);
        }

    }
}
