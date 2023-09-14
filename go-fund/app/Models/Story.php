<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    use HasFactory;
    protected $fillable = [
        'story',
        'image',
        'sum',
    ];

    public function images()
    {
        return $this->hasMany(ImgGallery::class, 'author_id');
    }
}
