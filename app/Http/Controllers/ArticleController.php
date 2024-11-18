<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Expert;

class ArticleController extends Controller
{
    public function showHomePage()
    {
        $articles = Article::all();
        $experts = Expert::all();

        return view('features.home', compact('articles', 'experts'));
    }

    public function showAllArticle(){
        $articles = Article::paginate(9);
        return view('features.articles')->with('articles', $articles);
    }

    public function showDetailArticle(Request $request)
    {
        $article = Article::find($request->id);
        return view('features.articleDetail')->with('article', $article);
    }
}
