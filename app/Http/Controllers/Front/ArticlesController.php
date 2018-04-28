<?php

namespace App\Http\Controllers\Front;

use App\Entities\Article;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticlesController extends Controller
{
    public function articlesList()
    {
        $articles = Article::where('is_published', 1)->orderBy('created_at', 'desc')->get();
        $archive = Article::getArticlesArchiveList();
        return view('front.articles.articles', ['articlesList' => $articles, 'archive' => $archive]);
    }

    public function showArchive(int $year, string $month)
    {
        $articles = Article::where('is_published', 1)
            ->whereYear('created_at', $year)
            ->whereMonth('created_at', Carbon::parse($month)->month)
            ->orderBy('created_at', 'desc')->get();

        return view('front.articles.articles', ['articlesList' => $articles, 'archive' => Article::getArticlesArchiveList(), 'year' => $year, 'month' => $month]);

    }

    public function showArticle(int $id)
    {
        $articles = Article::find($id);

        return view('front.articles.show', ['articles' => $articles]);
    }
}
