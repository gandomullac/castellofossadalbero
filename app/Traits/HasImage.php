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
        return Storage::delete('public/' . $this->image);
    }

    public function getImageAttribute($value)
    {
        return $value ?? asset($this->getImagePlaceholder());
    }

    protected static function booted(): void
    {
        static::deleted(function ($model): void {
            $model->deleteImage();
        });
    }
}
