<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait HasImage
{
    public static function getImagePlaceholder()
    {
        return '/assets/img/placeholders/img_placeholder.svg';
    }

    public function getImageAttribute()
    {
        return Storage::url($this->image_path) ?? asset($this->getImagePlaceholder());
    }

    protected static function booted(): void
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
