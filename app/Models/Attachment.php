<?php

namespace App\Models;

use App\Interfaces\ProtectionContract;
use App\Traits\HasProtection;
use App\Traits\HasUserAttributes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Attachment extends Model implements ProtectionContract
{
    use HasFactory;
    use HasProtection;
    use HasUserAttributes;

    protected $guarded = [];

    public function getFileUrlAttribute()
    {
        return url(Storage::url('public/' . $this->path));
    }

    public function getFileSizeAttribute()
    {
        $size = Storage::size('public/' . $this->path) / 1024 / 1024;

        return number_format($size, 2);
    }

    public function deleteFile()
    {
        return Storage::delete('public/' . $this->path);
    }
}
