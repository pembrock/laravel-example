<?php

namespace App\Http\Controllers\Admin;

use App\Entities\Article;
use App\Http\Requests\ArticleRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ArticlesController extends Controller
{
    public $uploadPath = 'upload/articles';
    public function index()
    {
        //$objArticles = new Article();
        $articles = Article::orderBy('id', 'desc')->get();

        return view('admin.articles.index', ['articles' => $articles]);
    }

    public function addRequestArticle(ArticleRequest $request)
    {
        $objArticle = new Article();
        if (!is_null($request->file('image'))) {
            $file = $request->file('image');
            if (!is_null($this->uploadPath)) {
                $path = $file->move($this->uploadPath, $file->getClientOriginalName());
            }
        }
        $path = isset($path) ? $path->getPathname() : NULL;
        $objArticle = $objArticle->create([
            'header' => $request->input('header'),
            'description' => $request->input('description'),
            'text' => $request->input('text'),
            'img_path' => $path
        ]);

        if ($objArticle) {
            return redirect()->route('articles.edit', $objArticle->id)->with('success', 'Запись успешно добавлена');
        }

        return back()->with('error', 'Запись не добавлена');
    }

    public function addArticle()
    {

        return view('admin.articles.add');
    }

    public function editArticle(int $id)
    {
        $article = Article::find($id);

        if(!$article) {
            return redirect()->route('articles')->with('error', 'Страница не найдена');
        }
        Storage::delete($article->img_path);
        return view('admin.articles.edit', ['article' => $article]);
    }

    public function editRequestArticle(ArticleRequest $request, int $id)
    {
        $isPublished = boolval($request->has('is_published'));
        $article = Article::find($id);
        if (!is_null($request->file('image'))) {
            if (!is_null($article->img_path)) {
                Article::deleteImage($article->img_path);
            }

            $file = $request->file('image');
            $path = $file->move($this->uploadPath,$file->getClientOriginalName());

        }
        $path = isset($path) && !empty($path) ? $path->getPathname() : $article->img_path;
        if (Article::where('id', $id)->update([
            'header' => $request->input('header'),
            'description' => $request->input('description'),
            'text' => $request->input('text'),
            'is_published' => $isPublished,
            'img_path' => $path
        ])) {
            return redirect()->route('articles')->with('success', 'Запись обновлена');
        }

        return back()->with('error', 'Не удалось обновить запись');
    }

    public function deleteArticle (Request $request)
    {
        if ($request->ajax()) {
            $id = (int) $request->input('id');
            $objArticle = Article::find($id);
            if (!is_null($objArticle->img_path)) {
                Article::deleteImage($objArticle->img_path);
            }

            Article::where('id',$id)->delete();
        }
    }

    public function deleteArticleImage (Request $request)
    {
        if ($request->ajax()) {
            $id = (int) $request->input('id');
            $objArticle = Article::find($id);
            Article::deleteImage($objArticle->img_path);
            $objArticle->img_path = NULL;
            $objArticle->save();
        }
    }
}
