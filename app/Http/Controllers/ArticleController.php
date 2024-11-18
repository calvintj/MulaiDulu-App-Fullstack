<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    public function showAllArticle(){
        $articles = Article::all();
        return view('articlepage')->with('article', $articles);
    }

    public function showDetailArticle(Request $request){
        $artikel = Article::find($request->id);
        return view('detailarticle')->with('artikle', $artikel);
    }
}
