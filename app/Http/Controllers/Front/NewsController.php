<?php

namespace App\Http\Controllers\Front;

use App\Entities\News;
use Carbon\Carbon;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    public function newsList()
    {
        $news = News::where('is_published', 1)->orderBy('created_at', 'desc')->get();
        $archive = News::getNewsArchiveList();
        return view('front.news.news', ['newsList' => $news, 'archive' => $archive]);
    }

    public function showArchive(int $year, string $month)
    {
        $news = News::where('is_published', 1)
                        ->whereYear('created_at', $year)
                        ->whereMonth('created_at', Carbon::parse($month)->month)
                        ->orderBy('created_at', 'desc')->get();

        return view('front.news.news', ['newsList' => $news, 'archive' => News::getNewsArchiveList(), 'year' => $year, 'month' => $month]);

    }

    public function showNews(int $id)
    {
        $news = News::find($id);

        return view('front.news.show', ['news' => $news]);
    }
}
