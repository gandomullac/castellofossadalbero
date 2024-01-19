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
        return $this->belongsToMany
            (
                related:MenuCategory::class,
                table:'menu_item_menu_category',
                foreignPivotKey:'menu_category_id',
                relatedPivotKey:'menu_item_id'
            )
            ->withPivot(['order'])
            ->withTimestamps();
    }
}
