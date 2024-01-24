<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function isPublished()
    {
        return $this->unpublished_at <= now();
    }

    public function toBePublished()
    {
        return $this->published_at <= now() && $this->published_at != null;
    }

    public function isExpired()
    {
        return $this->published_at <= now() && $this->published_at != null;
    }

    public function getPublishStatusAttribute()
    {
        if ($this->archived) {
            return 'archived';
        } elseif ($this->isExpired()) {
            return 'expired';
        } elseif ($this->toBePublished()) {
            return 'draft';
        }

        return 'published';
    }

    // method to show a short excerpt of the post, without html tags

    public function getExcerptAttribute()
    {

        $content = strip_tags($this->content);

        return substr($content, 0, 60).'...';

    }
}
