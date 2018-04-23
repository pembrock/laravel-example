<?php

namespace App\Http\Controllers\Front;

use App\Entities\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    public function newsList()
    {
        $news = News::where('is_published', 1)->orderBy('created_at', 'desc')->get();
        return view('front.news.news', ['newsList' => $news]);
    }
    public function showNews(int $id)
    {
        $news = News::find($id);

        return view('front.news.show', ['news' => $news]);
    }
}
