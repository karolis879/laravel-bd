<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImgGallery extends Model
{
    use HasFactory;
    protected $fillable = [
        'image', // Add the 'image' field to the fillable property
        'author_id',
    ];

    public function story()
    {
        return $this->belongsTo(Story::class, 'author_id');
    }
}
