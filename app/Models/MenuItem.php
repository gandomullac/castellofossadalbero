<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'tags' => 'array',
    ];

    public function menuCategories()
    {
        return $this->belongsToMany(MenuCategory::class, 'menu_item_menu_categories')
            ->withPivot(['order'])
            ->withTimestamps();
    }
}
