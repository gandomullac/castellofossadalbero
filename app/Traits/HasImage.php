<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait HasImage
{
    public function deleteImage()
    {
        return Storage::delete('public/'.$this->image);
    }

    protected static function booted()
    {
        static::deleted(function ($model) {
            $model->deleteImage();
        });
    }

    public function getImageAttribute($value)
    {
        return $value ?? asset($this->IMAGE_PLACEHOLDER);
    }

    public function getImagePlaceholder()
    {
        return 'img/placeholders/food_placeholder.jpg';
    }
}
