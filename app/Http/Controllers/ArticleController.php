<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->input('q');
        $articles = $q ? Article::where('name', 'like', "%{$q}%")->paginate(9) : Article::paginate(9);

        return view('articles.index', compact('articles', 'q'));
    }

    public function show($id)
    {
        $article = Article::findOrFail($id);
        return view('articles.show', compact('article'));
    }

    public function create()
    {
        $article = new Article();
        return view('articles.create', compact('article'));
    }

    public function store(StorePostRequest $request)
    {
        $article = Article::create($request->validated());
            
        return redirect()->route('articles.index')
                         ->with('success', 'Статья успешно создана!');
    }

    public function edit($id)
    {
        $article = Article::findOrFail($id);
        return view('articles.edit', compact('article'));
    }

    public function update(StorePostRequest $request, $id)
    {
        $article = Article::findOrFail($id);
        $article->update($request->validated());

        return redirect()->route('articles.index')
                         ->with('success', 'Статья успешно обновлена!');
    }

    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $article->delete();

        return redirect()->route('articles.index')
                         ->with('success', 'Статья успешно удалена!');
    }
}