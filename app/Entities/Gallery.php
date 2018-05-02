<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'galleries';

    protected $fillable = [
        'title',
        'is_visible'
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];
}
