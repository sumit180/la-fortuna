<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryCategory extends Model
{
    /** @use HasFactory<\Database\Factories\GalleryCategoryFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'short_description',
    ];

    public function galleries()
    {
        return $this->hasMany(Gallery::class);
    }
}
