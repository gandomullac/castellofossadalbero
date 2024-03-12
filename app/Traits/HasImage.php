<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait HasImage
{
    public static function getImagePlaceholder()
    {
        return '/assets/img/placeholders/img_placeholder.svg';
    }

    public function getImageUrlAttribute()
    {
        if (null === $this->image_path) {
            return asset($this->getImagePlaceholder());
        }
        if (Storage::disk('public')->exists($this->image_path)) {
            return Storage::url($this->image_path);
        }
        return asset($this->getImagePlaceholder());
    }

    public function getImageAttribute()
    {
        if (null === $this->image_path) {
            return asset($this->getImagePlaceholder());
        }
        if (Storage::disk('public')->exists($this->image_path)) {
            return $this->image_path;
        }
        return asset($this->getImagePlaceholder());
    }


    protected static function bootHasImage(): void
    {
        static::deleted(function ($model): void {
            Storage::disk('public')->delete($model->image_path);
        });

        static::updating(function ($model): void {
            if ($model->isDirty('image_path') && (null !== $model->getOriginal('image_path'))) {
                Storage::disk('public')->delete($model->getOriginal('image_path'));
            }
        });
    }
}
