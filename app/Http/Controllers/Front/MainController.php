<?php

namespace App\Http\Controllers\Front;

use App\Entities\Article;
use App\Entities\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MainController extends Controller
{
    public function index()
    {
        $news = News::where('is_published', 1)->orderBy('created_at', 'desc')->limit(3)->get();
        $articles = Article::where('is_published', 1)->orderBy('created_at', 'desc')->limit(3)->get();
        return view('index', ['newsItems' => $news, 'articlesItems' => $articles]);
    }
}
