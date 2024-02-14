<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait HasImage
{
    public static function getImagePlaceholder()
    {
        return '/assets/img/placeholders/img_placeholder.svg';
    }

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
        return $value ?? asset($this->getImagePlaceholder());
    }
}
