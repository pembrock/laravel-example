<?php

namespace App\Http\Controllers\Admin;

use App\Entities\Article;
use App\Entities\Category;
use App\Entities\CategoryArticle;
use App\Http\Requests\ArticleRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticlesController extends Controller
{
    public function index()
    {
        $objArticle = new Article();
        $articles = $objArticle->get();
        return view('admin.articles.index', ['articles' => $articles]);
    }

    public function addArticle()
    {
        $objCategories = new Category();
        $categories = $objCategories->get();
        return view('admin.articles.add', ['categories' => $categories]);
    }

    public function addRequestArticle(ArticleRequest $request)
    {
        $objArticle = new Article();
        $objCategoryArticle = new CategoryArticle();

        $full_text = $request->input('full_text') ?? null;
        $objArticle = $objArticle->create([
            'title' =>  $request->input('title'),
            'author' =>  $request->input('author'),
            'short_text' =>  $request->input('short_text'),
            'full_text' =>  $full_text,
            'title' =>  $request->input('title'),
        ]);
        if ($objArticle) {
            foreach ($request->input('categories') as $category_id) {
                $category_id = (int)$category_id;
                $objCategoryArticle = $objCategoryArticle->create([
                    'category_id' => $category_id,
                    'article_id'  => $objArticle->id
                ]);
            }

            return redirect()->route('articles')->with('success', 'Статья успешно добавлена');
        }
        return back()->with('success', 'Статья успешно добавлена');
    }
}
