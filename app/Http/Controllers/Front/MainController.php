<?php

namespace App\Http\Controllers\Front;

use App\Entities\Article;
use App\Entities\Gallery;
use App\Entities\ImageGallery;
use App\Entities\News;
use App\Entities\Shop;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MainController extends Controller
{
    public function index()
    {
        $news = News::where('is_published', 1)->orderBy('created_at', 'desc')->limit(3)->get();
        $articles = Article::where('is_published', 1)->orderBy('created_at', 'desc')->limit(3)->get();
        $shop = Shop::where('is_visibility', 1)->orderBy('created_at', 'desc')->get();

        $galleries = Gallery::where('is_visible', 1)->get();
        $galleryPreview = [];
        foreach ($galleries as $gallery) {
            $preview = ImageGallery::where('gallery_id', $gallery->id)->first();
            $galleryPreview[$gallery->id] = $preview->path;
        }

        return view('index', [
            'newsItems' => $news,
            'articlesItems' => $articles,
            'shop' => $shop,
            'galleries' => $galleries,
            'preview' => $galleryPreview]);
    }
}
