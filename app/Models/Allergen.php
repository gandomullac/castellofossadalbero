<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Allergen extends Model
{
    use HasFactory;

    public function menuItems()
    {
        return $this->belongsToMany(
            related: Allergen::class,
            table: 'allergen_menu_item',
            foreignPivotKey: 'allergen_id',
            relatedPivotKey: 'menu_item_id',
        );
    }

    public function getNameAttribute()
    {
        return $this->attributes['name_' . app()->getlocale()];
    }
}
