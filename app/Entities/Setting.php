<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'settings';
    protected $primaryKey = 'id';

    protected $fillable = [
      'text'
    ];

    protected $dates = [
        'created_at', 'updated_at'
    ];
}
