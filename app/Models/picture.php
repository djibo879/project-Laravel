<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use League\Glide\Urls\UrlBuilderFactory;

class Picture extends Model
{
    use HasFactory;

    protected $fillable = ['filename'];

    protected static function booted(): void
    {
        static::deleting(function (Picture $picture) {
            Storage::disk('public')->delete($picture->filename);
        });
    }

    public function getImageUrl(?int $width = null, ?int $height = null): string
    {
        if ($width === null) {
            return Storage::disk('public')->url($this->filename);
        }
        $urlBuilder = UrlBuilderFactory::create('/images/',null);
        return $urlBuilder->getUrl($this->filename, ['w' => $width, 'h' => $height, 'fit' => 'crop']);
    }
}

