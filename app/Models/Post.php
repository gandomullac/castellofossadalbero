<?php

namespace App\Models;

use App\Interfaces\ImageContract;
use App\Traits\HasImage;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model implements ImageContract
{
    use HasFactory;
    use HasImage;

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


    // protected function archived(): Attribute
    // {
    //     return Attribute::make(
    //         get: fn(int $value) => (bool) $value
    //     );
    // }

    // protected function unpublished_at(): Attribute
    // {
    //     return Attribute::make(
    //         get: fn(string $value) => Carbon::parse($value)
    //     );
    // }
}
