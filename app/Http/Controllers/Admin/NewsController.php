<?php

namespace App\Http\Controllers\Admin;

use App\Entities\News;
use App\Http\Controllers\Controller;
use App\Http\Requests\NewsRequest;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public $uploadPath = 'upload/news';
    public function index()
    {
//        $objNews = new News();
        $news = News::orderBy('id', 'desc')->get();

        return view('admin.news.index', ['news' => $news]);
    }

    public function addRequestNews(NewsRequest $request)
    {
        $objNews = new News();
        if(!is_null($request->file('image'))) {
            $file = $request->file('image');
            $path = $file->move($this->uploadPath, $file->getClientOriginalName());
        }
        $path = isset($path) ? $path->getPathname() : NULL;
        $objNews = $objNews->create([
            'header' => $request->input('header'),
            'description' => $request->input('description'),
            'text' => $request->input('text'),
            'img_path' => $path
        ]);

        if ($objNews) {
            return redirect()->route('news.edit', $objNews->id)->with('success', 'Запись успешно добавлена');
        }

        return back()->with('error', 'Запись не добавлена');
    }

    public function addNews()
    {

        return view('admin.news.add');
    }

    public function editNews(int $id)
    {
        $news = News::find($id);

        if(!$news) {
            return redirect()->route('news')->with('error', 'Страница не найдена');
        }
        Storage::delete($news->img_path);
        return view('admin.news.edit', ['news' => $news]);
    }

    public function editRequestNews(NewsRequest $request, int $id)
    {
        //$news = News::find($id);
        $isPublished = boolval($request->has('is_published'));
        $news = News::find($id);
        if (!is_null($request->file('image'))) {
            if (!is_null($news->img_path)) {
                News::deleteImage($news->img_path);
            }

            $file = $request->file('image');
            $path = $file->move($this->uploadPath,$file->getClientOriginalName());

        }
        $path = isset($path) && !empty($path) ? $path->getPathname() : $news->img_path;
        if (News::where('id', $id)->update([
            'header' => $request->input('header'),
            'description' => $request->input('description'),
            'text' => $request->input('text'),
            'is_published' => $isPublished,
            'img_path' => $path
        ])) {
            return redirect()->route('news')->with('success', 'Запись обновлена');
        }

        return back()->with('error', 'Не удалось обновить запись');
    }

    public function deleteNews (Request $request)
    {
        if ($request->ajax()) {
            $id = (int) $request->input('id');
            $objNews = News::find($id);
            if (!is_null($objNews->img_path)) {
                News::deleteImage($objNews->img_path);
            }

            News::where('id',$id)->delete();
        }
    }

    public function deleteNewsImage (Request $request)
    {
        if ($request->ajax()) {
            $id = (int) $request->input('id');
            $objNews = News::find($id);
            News::deleteImage($objNews->img_path);
            $objNews->img_path = NULL;
            $objNews->save();
        }
    }
}
