<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Filesystem\Filesystem;

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

    /**
     * Удаление изображения новости
     * @param string $path
     */
    static public function deleteImage(string $path)
    {
        app(Filesystem::class)->delete(public_path($path));
    }

    /**
     * @return mixed
     */
    static public function getNewsArchiveList()
    {
        return self::selectRaw('year(created_at) year, monthname(created_at) month, count(*) is_published')
            ->groupBy('year', 'month')
            ->orderByRaw('min(created_at) desc')
            ->get();
    }
}
