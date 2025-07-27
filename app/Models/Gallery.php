<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Gallery extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function isPortrait()
{
    $mediaPath = Storage::path($this->media);

    // Check if file exists
    if (!file_exists($mediaPath)) {
        return false;
    }

    // Use Laravel's File facade to get MIME type
    $mime = File::mimeType($mediaPath);

    if (Str::startsWith($mime, 'image')) {
        $imageSize = getimagesize($mediaPath);
        return $imageSize[0] < $imageSize[1];
    }

    // For videos or non-image files, assume it's not portrait
    return false;
}
}
