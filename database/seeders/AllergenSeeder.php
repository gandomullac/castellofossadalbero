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
            'Celery' => ['English' => 'Celery', 'Italian' => 'Sedano'],
            'Crustacean' => ['English' => 'Crustacean', 'Italian' => 'Crostaceo'],
            'Egg' => ['English' => 'Egg', 'Italian' => 'Uovo'],
            'Fish' => ['English' => 'Fish', 'Italian' => 'Pesce'],
            'Gluten' => ['English' => 'Gluten', 'Italian' => 'Glutine'],
            'Lupin' => ['English' => 'Lupin', 'Italian' => 'Lupino'],
            'Milk' => ['English' => 'Milk', 'Italian' => 'Latte'],
            'Mustard' => ['English' => 'Mustard', 'Italian' => 'Senape'],
            'Nuts' => ['English' => 'Nuts', 'Italian' => 'Frutta a guscio'],
            'Peanuts' => ['English' => 'Peanuts', 'Italian' => 'Arachidi'],
            'Sesame' => ['English' => 'Sesame', 'Italian' => 'Sesamo'],
            'Shellfish' => ['English' => 'Shellfish', 'Italian' => 'Frutti di mare'],
            'Soy' => ['English' => 'Soy', 'Italian' => 'Soia'],
            'Sulfites' => ['English' => 'Sulfites', 'Italian' => 'Solfati'],
        ];
        

        foreach ($allergens as $key => $allergen) {
            Allergen::create([
                'name_en' => $allergen['English'],
                'name_it' => $allergen['Italian'],
                'image' => "assets/img/allergens/". $allergen['English'] . ".svg" 
            ]);
        }
    }
}
