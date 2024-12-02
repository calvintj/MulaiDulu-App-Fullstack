<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Expert;
use Illuminate\Support\Facades\Storage;

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
        return view('admin.articlesCRUD', compact('articles'));
    }

    public function create()
    {
        return view('admin.articlesCRUD');
    }

    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'content' => 'required',
            'post_date' => 'required|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Collect all data from the request
        $data = $request->only(['title', 'author', 'content', 'post_date']);

        // Handle the image file
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images', 'public');
            $data['image'] = $path; // Save full path relative to 'storage/app/public/'
        }

        // Save the article to the database
        Article::create($data);

        // Redirect back to the index page with success message
        return redirect()->route('admin.articlesCRUD.index')->with('success', 'Article created successfully.');
    }

    public function show($id)
    {
        $view = Article::findOrFail($id);
        return view('admin.articlesCRUD', compact('view'));
    }

    public function edit($id)
    {
        $article = Article::findOrFail($id);
        return view('admin.articlesCRUD', compact('article'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'content' => 'required',
            'post_date' => 'required|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $article = Article::findOrFail($id);
        $data = $request->all();
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images', 'public');
        }

        $article->update($data);
        return redirect()->route('admin.articlesCRUD.index')->with('success', 'Article updated successfully.');
    }

    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        if ($article->image) {
            Storage::delete('public/' . $article->image);
        }
        $article->delete();
        return redirect()->route('admin.articlesCRUD.index')->with('success', 'Article deleted successfully.');
    }
}
