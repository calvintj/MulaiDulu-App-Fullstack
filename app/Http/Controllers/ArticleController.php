<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    public function showAllArticle(){
        $articles = Article::all();
        return view('features.home')->with('articles', $articles);
    }

    public function showDetailArticle(Request $request){
        $article = Article::find($request->id);
        return view('features.articleDetail')->with('article', $article);
    }
}
