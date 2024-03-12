<?php

namespace App\Models;

use App\Traits\HasUserAttributes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class MenuCategory extends Model
{
    use HasFactory;
    use HasUserAttributes;

    protected $guarded = [];

    public static function highestAvailableOrder()
    {
        return self::max('order') + 1;

    }

    public function menuItems()
    {
        return $this->belongsToMany(
            related: MenuItem::class,
            table: 'menu_item_menu_category',
            foreignPivotKey: 'menu_item_id',
            relatedPivotKey: 'menu_category_id'
        )->withTimestamps();
    }

    public function getCountMenuItemsAttribute()
    {
        return $this->menuItems()->count();
    }

    public function getSlugAttribute()
    {
        return Str::slug($this->name);
    }
}
