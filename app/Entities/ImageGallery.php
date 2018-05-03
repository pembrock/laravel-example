<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class ImageGallery extends Model
{
    protected $table = 'photos_gallery';
    protected $primaryKey = 'id';

    protected $fillable = [
        'gallery_id',
        'path'
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];
}
