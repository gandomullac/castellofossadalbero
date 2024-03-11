<?php

namespace App\Models;

use App\Traits\HasExcerpt;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasExcerpt;
    use HasFactory;

    protected $guarded = [];
}
