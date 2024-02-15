<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getExcerptAttribute()
    {

        $content = strip_tags($this->content);

        return mb_substr($content, 0, 60) . '...';

    }
}
