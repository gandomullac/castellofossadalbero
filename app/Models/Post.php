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
        return $this->published_at <= now();
    }



    public function getPublishStatusAttribute()
    {
        if ($this->archived)
            return 'archived';
        else if ($this->isExpired()) 
            return 'expired';
        else if ($this->toBePublished())
            return 'draft';
        

        return 'published';
    }
}
