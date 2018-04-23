<?php

namespace App\Http\Controllers\Admin;

use App\Entities\News;
use App\Http\Controllers\Controller;
use App\Http\Requests\NewsRequest;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $objNews = new News();
        $news = $objNews->get();

        return view('admin.news.index', ['news' => $news]);
    }

    public function addRequestNews(NewsRequest $request)
    {
        $objNews = new News();
        $path = $request->file('image')->store('upload/news');
        $path = !$request->file('image')->isValid() ? null : $path;
        $objNews = $objNews->create([
            'header' => $request->input('header'),
            'description' => $request->input('description'),
            'text' => $request->input('text'),
            'img_path' => $path
        ]);

        if ($objNews) {
            return redirect()->route('news')->with('success', 'Запись успешно добавлена');
        }

        return back()->with('error', 'Запись не добавлена');
    }

    public function addNews()
    {

        return view('admin.news.add');
    }

    public function editNews(int $id)
    {

    }

    public function editRequestNews(Request $request, int $id)
    {
        dd($request->all());
    }

    public function deleteNews (Request $request)
    {

    }

}
