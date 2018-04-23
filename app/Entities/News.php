<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = "news";
    protected $primaryKey = "id";

    protected $fillable = [
        'header',
        'description',
        'text',
        'img_path',
        'is_published'
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];
}
