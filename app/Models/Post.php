<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected static function booted()
    {
        static::deleted(function ($post) {
            // dd($post->image, $post->deleteImage());
            $post->deleteImage();
        });
    }

    public function deleteImage()
    {
        return Storage::delete('public/'.$this->image);
    }

    public function isPublished()
    {
        return $this->archived === false &&
            (
                (
                    $this->published_at !== null &&
                    $this->published_at <= now() &&
                    (
                        $this->unpublished_at === null ||
                        $this->unpublished_at >= now()
                    )
                )
                ||
                (
                    $this->published_at === null &&
                    (
                        $this->unpublished_at === null ||
                        $this->unpublished_at >= now()
                    )
                )
            );
    }

    public function isScheduled()
    {
        return $this->archived == false &&
            $this->published_at !== null &&
            $this->published_at > now();
    }

    public function isExpired()
    {
        return $this->archived == false &&
        (
            $this->unpublished_at !== null &&
            $this->unpublished_at < now()
        );
    }

    public function getPublishStatusAttribute()
    {
        if ($this->archived) {
            return __('castello.archived');
        } elseif ($this->isPublished()) {
            return __('castello.published');
        } elseif ($this->isScheduled()) {
            return __('castello.scheduled');
        } elseif ($this->isExpired()) {
            return __('castello.expired');
        }

        return __('castello.published');
    }

    // method to show a short excerpt of the post, without html tags

    public function getExcerptAttribute()
    {

        $content = strip_tags($this->content);

        return substr($content, 0, 60).'...';

    }

    public function scopePublished($query)
    {
        return $query->where('archived', false)
            ->where(function ($query) {
                $query->where(function ($query) {
                    $query->whereNotNull('published_at')
                        ->where('published_at', '<=', now())
                        ->where(function ($query) {
                            $query->whereNull('unpublished_at')
                                ->orWhere('unpublished_at', '>=', now());
                        });
                })
                    ->orWhere(function ($query) {
                        $query->whereNull('published_at')
                            ->where(function ($query) {
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
            ->where(function ($query) {
                $query->whereNotNull('published_at')
                    ->where('published_at', '<=', now())
                    ->where(function ($query) {
                        $query->whereNull('unpublished_at')
                            ->orWhere('unpublished_at', '<=', now());
                    });
            });
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
}
