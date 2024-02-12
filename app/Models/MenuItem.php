<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    use HasFactory;

    const FOOD_PLACEHOLDER = 'img/food_placeholder.jpg';

    protected $guarded = [];

    protected $casts = [
        'tags' => 'array',
    ];

    public function menuCategories()
    {
        return $this->belongsToMany(
            related: MenuCategory::class,
            table: 'menu_item_menu_category',
            foreignPivotKey: 'menu_item_id',
            relatedPivotKey: 'menu_category_id'
        )->withTimestamps();
    }

    public function allergens()
    {
        return $this->belongsToMany(
            related: Allergen::class,
            table: 'allergen_menu_item',
            foreignPivotKey: 'allergen_id',
            relatedPivotKey: 'menu_item_id'
        );
    }

    public function getImageAttribute($value)
    {
        return $value ?? asset(self::FOOD_PLACEHOLDER);
    }

    public function getColorAttribute()
    {
        return $this->menuCategories->sortBy('id')->last()->color;
    }

    public function getShortTitleAttribute()
    {

        $content = strip_tags($this->title);

        return substr($content, 0, 75).'...';

    }
}
