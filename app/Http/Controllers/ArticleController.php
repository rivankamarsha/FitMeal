<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function article()
    {
        $articles = Article::latest()->get();
        return view('artikel.artikel', compact('articles'));
    }

    public function showArticle($slug)
    {
        $article = Article::where('slug', $slug)->firstOrFail();
        
        $relatedArticles = Article::where('id', '!=', $article->id)
                                ->limit(3)
                                ->get();
        
        return view('artikel.detail-artikel', compact('article', 'relatedArticles'));
    }

}
