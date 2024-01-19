<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuCategory extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function menuItems()
    {
        return $this->belongsToMany
            (
                related:MenuItem::class,
                table:'menu_item_menu_category',
                foreignPivotKey:'menu_item_id',
                relatedPivotKey:'menu_category_id'
            )
                ->withPivot(['order'])
                ->withTimestamps();
    }
}
