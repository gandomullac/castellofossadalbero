<?php

namespace App\Models;

use App\Traits\HasUserAttributes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    use HasUserAttributes;

    protected $guarded = [];

    // write a method to get an associative array of settings
    public static function getSettings()
    {
        return Setting::all()->pluck('value', 'key')->toArray();
    }
}
