<?php

namespace App\Http\Controllers\Front;

use App\Entities\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticlesController extends Controller
{
    public function articlesList()
    {
        $articles = Article::where('is_published', 1)->orderBy('created_at', 'desc')->get();
        return view('front.articles.articles', ['articlesList' => $articles]);
    }
    public function showArticle(int $id)
    {
        $articles = Article::find($id);

        return view('front.articles.show', ['articles' => $articles]);
    }
}
