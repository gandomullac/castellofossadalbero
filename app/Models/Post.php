<?php

namespace App\Models;

use App\Interfaces\ImageContract;
use App\Interfaces\ProtectionContract;
use App\Traits\HasExcerpt;
use App\Traits\HasImage;
use App\Traits\HasProtection;
use App\Traits\HasUserAttributes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model implements ImageContract, ProtectionContract
{
    use HasExcerpt;
    use HasFactory;
    use HasImage;
    use HasProtection;
    use HasUserAttributes;

    protected $guarded = [];

    protected $casts = [
        'archived' => 'boolean',
        'unpublished_at' => 'datetime:Y-m-d H:i:s',
    ];

    public static function getImageSaveLocation()
    {
        return 'uploads/post/';
    }

    public static function countPosts(string $type)
    {
        return match ($type) {
            'published' => Post::query()->published()->count(),
            'scheduled' => Post::query()->scheduled()->count(),
            'expired' => Post::query()->expired()->count(),
            'archived' => Post::query()->where('archived', true)->count(),
            default => Post::all()->count(),
        };
    }

    public function isPublished()
    {
        return
            false === $this->archived &&
            ! $this->isExpired() &&
            ! $this->isScheduled();
    }

    public function isScheduled()
    {
        return false === $this->archived &&
            null !== $this->published_at &&
            $this->published_at > now();
    }

    public function isExpired()
    {
        return
            null !== $this->unpublished_at &&
            $this->unpublished_at->isPast() &&
            (false === $this->archived);
    }

    public function getPublishStatusAttribute()
    {
        if ($this->archived) {
            return __('castello.archived');
        }
        if ($this->isScheduled()) {
            return __('castello.scheduled');
        }
        if ($this->isExpired()) {
            return __('castello.expired');
        }

        return __('castello.published');
    }

    public function scopePublished($query)
    {
        return $query->where('archived', false)
            ->where(function ($query): void {
                $query->where(function ($query): void {
                    $query->whereNotNull('published_at')
                        ->where('published_at', '<=', now())
                        ->where(function ($query): void {
                            $query->whereNull('unpublished_at')
                                ->orWhere('unpublished_at', '>=', now());
                        });
                })
                    ->orWhere(function ($query): void {
                        $query->whereNull('published_at')
                            ->where(function ($query): void {
                                $query->whereNull('unpublished_at')
                                    ->orWhere('unpublished_at', '>=', now());
                            });
                    });
            });
    }

    public function scopeScheduled($query)
    {
        return $query->where('archived', false)
            ->whereNotNull('published_at')
            ->where('published_at', '>', now());
    }

    public function scopeExpired($query)
    {
        return $query->whereNotNull('unpublished_at')
            ->where(function ($query): void {
                $query->where('unpublished_at', '<', now())
                    ->orWhere('archived', false);
            });
    }
}
