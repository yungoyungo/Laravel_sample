<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Article;

class ArticlesController extends Controller
{
    //  Articles テーブルのデータ全てを抽出し、ビューに渡す
    public function index() {
        $articles = Article::all();

        return view('articles.index', compact('articles'));
    }

    // とりあえず引数で受け取った $id を表示するのみ
    public function show($id) {
        $article = Article::findOrFail($id);

        return view('articles.show', compact('article'));
    }

    public function create()
    {
        return view('articles.create');
    }

    // Illuminate\Http\Requestクラスのインスタンスを取得
    public function store(Request $request)
    {
        $rules = [
            'title' => 'required|min:3',
            'body'=> 'required',
            'published_at' => 'required|date',
        ];
        $validated = $this->validate($request, $rules);

        // コントローラの名前空間でファサードクラスを使うには、グローバルクラスとして指定する必要がある
        //$inputs = \Request::all();
        //Article::create($inputs);

        Article::create($validated);

        // デバッグ用
        //dd($inputs);

        return redirect('articles');
    }
}
