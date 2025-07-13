<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;
use App\Models\Picture;


class Property extends Model
{
    use HasFactory;
    protected $fillable = [
    'title',
    'description',
    'surface',
    'price',
    'rooms',
    'bedrooms',
    'floor',
    'city',
    'adresse',
    'postal_code',
    'sold',
    
];
public function options(){
    return $this->belongsToMany(Option::class);
}
public function getSlug(): string{
    return Str::slug($this->title);


}
public function pictures()
{
return $this->hasMany(Picture::class);
}
/**
 * @param UploadedFile[] $files
 */
public function attachFiles(array $files)
{
    $pictures = [];
    foreach ($files as $file) {
        if ($file->getError()) {
            continue;
        }
        
        $filename = $file->store('properties/' . $this->id, 'public');
        $pictures[] = [
            'filename' => $filename
        ];
    }
    
    if (count($pictures) > 0) {
        $this->pictures()->createMany($pictures);
    }
}
public function getPicture(): ?Picture{
    return $this->pictures[0] ?? null;
}
}
