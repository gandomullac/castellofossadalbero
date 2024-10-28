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
        if ($this->image_path === null) {
            return asset($this->getImagePlaceholder());
        }
        if (Storage::disk('public')->exists($this->image_path)) {
            return Storage::url($this->image_path);
        }
        return asset($this->getImagePlaceholder());
    }

    public function getImageAttribute()
    {
        if ($this->image_path === null) {
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
            if ($model->isDirty('image_path') && ($model->getOriginal('image_path') !== null)) {
                Storage::disk('public')->delete($model->getOriginal('image_path'));
            }
        });
    }
}
