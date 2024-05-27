<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class HomepageController extends Controller
{
    public function index()
    {
        $articles = Article::where('published_at', '<', now())
            ->withCount('comments')
            ->orderByDesc('published_at')
            ->take(4)
            ->get();

        return view('homepage.index', [
            'articles' => $articles,
        ]);
    }
}
