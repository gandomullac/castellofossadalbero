<?php

namespace App\Models;

use App\Interfaces\ImageContract;
use App\Traits\HasImage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model implements ImageContract
{
    use HasFactory;
    use HasImage;

    protected $guarded = [];

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
        return false === $this->archived &&
            (
                (
                    null !== $this->published_at &&
                    $this->published_at <= now() &&
                    (
                        null === $this->unpublished_at ||
                        $this->unpublished_at >= now()
                    )
                )
                ||
                (
                    null === $this->published_at &&
                    (
                        null === $this->unpublished_at ||
                        $this->unpublished_at >= now()
                    )
                )
            );
    }

    public function isScheduled()
    {
        return false === $this->archived &&
            null !== $this->published_at &&
            $this->published_at > now();
    }

    public function isExpired()
    {
        return false === $this->archived &&
        (
            null !== $this->unpublished_at &&
            $this->unpublished_at < now()
        );
    }

    public function getPublishStatusAttribute()
    {
        if ($this->archived) {
            return __('castello.archived');
        }
        if ($this->isPublished()) {
            return __('castello.published');
        }
        if ($this->isScheduled()) {
            return __('castello.scheduled');
        }
        if ($this->isExpired()) {
            return __('castello.expired');
        }

        return __('castello.published');
    }

    // method to show a short excerpt of the post, without html tags

    public function getExcerptAttribute()
    {

        $content = strip_tags($this->content);

        return mb_substr($content, 0, 60) . '...';

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
        return $query->where('archived', false)
            ->where(function ($query): void {
                $query->whereNotNull('published_at')
                    ->where('published_at', '<=', now())
                    ->where(function ($query): void {
                        $query->whereNull('unpublished_at')
                            ->orWhere('unpublished_at', '<=', now());
                    });
            });
    }
}
