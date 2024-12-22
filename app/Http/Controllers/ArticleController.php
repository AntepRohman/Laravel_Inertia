<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index() {
        $items = Article::all();

        return view('articles.index', [
            'articles' => $items

        ]);

    }

    public function store(Request $request) {
        $data = $request->all();
        $data['image'] = $request->file('image')->store('article','public');
        Article::create($data);

        return redirect()->back();
    }
}
