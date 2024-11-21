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

    public function showAllArticle()
    {
        $articles = Article::paginate(9);
        return view('features.articles')->with('articles', $articles);
    }

    public function showDetailArticle(Request $request)
    {
        $article = Article::find($request->id);
        return view('features.articleDetail')->with('article', $article);
    }

    public function index()
    {
        $articles = Article::all();
        return view('Admin.articlesCRUD', compact('articles'));
    }

    public function create()
    {
        return view('Admin.articlesCRUD');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'isi_article' => 'required',
            'post_date' => 'required|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->all();
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images', 'public');
        }

        Article::create($data);
        return redirect()->route('Admin.articlesCRUD.index')->with('success', 'Article created successfully.');
    }

    public function show($id)
    {
        $view = Article::findOrFail($id);
        return view('Admin.articlesCRUD', compact('view'));
    }

    public function edit($id)
    {
        $article = Article::findOrFail($id);
        return view('Admin.articlesCRUD', compact('article'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'isi_article' => 'required',
            'post_date' => 'required|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $article = Article::findOrFail($id);
        $data = $request->all();
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images', 'public');
        }

        $article->update($data);
        return redirect()->route('Admin.articlesCRUD.index')->with('success', 'Article updated successfully.');
    }

    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        if ($article->image) {
            \Storage::delete('public/' . $article->image);
        }
        $article->delete();
        return redirect()->route('Admin.articlesCRUD.index')->with('success', 'Article deleted successfully.');
    }
}
