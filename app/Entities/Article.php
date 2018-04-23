<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Filesystem\Filesystem;

class Article extends Model
{
    protected $table = 'articles';
    protected $primaryKey = 'id';

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

    /**
     * Удаление изображения статьи
     * @param string $path
     */
    static public function deleteImage(string $path)
    {
        app(Filesystem::class)->delete(public_path($path));
    }
}
