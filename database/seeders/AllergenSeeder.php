<?php

namespace Database\Seeders;

use App\Models\Allergen;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AllergenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // add 14 allergens to the database
        $allergens = [
            'Celery',
            'Crustacean',
            'Egg',
            'Fish',
            'Gluten',
            'Lupin',
            'Milk',
            'Mustard',
            'Nuts',
            'Peanuts',
            'Sesame',
            'Shellfish',
            'Soy',
            'Sulfites',
        ];

        foreach ($allergens as $allergen) {
            Allergen::create([
                'name' => $allergen,
                'image' => "assets/img/allergens/$allergen.svg" 
            ]);
        }
    }
}
