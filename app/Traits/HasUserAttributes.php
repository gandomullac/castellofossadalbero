<?php

namespace App\Traits;

trait HasUserAttributes
{
    protected static function bootHasUserManagement(): void
    {
        static::creating(function ($model): void {
            $model->created_by = auth()->id();
        });

        static::updated(function ($model): void {
            $model->last_edit_by = auth()->id();
        });
    }
}
