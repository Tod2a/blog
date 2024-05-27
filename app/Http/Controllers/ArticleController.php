<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $articles = Article::where('published_at', '<', now())
        ->where('body', 'LIKE', '%'.$request->query('search').'%')
        ->orWhere('title', 'LIKE', '%'.$request->query('search').'%')
        ->orWhereHas('user', function ($query) use ($request) {
            $query->where('name', 'LIKE', '%'.$request->query('search').'%');
        })
        ->orderByDesc('published_at')
        ->paginate(12)
    ;

        return view('articles.index', [
            'articles' => $articles,
        ]);
    }

    public function show($id)
    {
        $article = Article::findOrFail($id);

        return view('articles.show', [
            'article' => $article,
        ]);
    }
}