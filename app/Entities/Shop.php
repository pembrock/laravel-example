<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Filesystem\Filesystem;

class Shop extends Model
{
    protected $table = "shop";
    protected $primaryKey = "id";

    protected $fillable = [
        'title',
        'description',
        'price',
        'img',
        'is_availability',
        'is_visibility'
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    /**
     * Удаление изображения товара
     * @param string $path
     */
    static public function deleteImage(string $path)
    {
        app(Filesystem::class)->delete(public_path($path));
    }
}
