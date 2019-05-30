<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Http\Requests\ArticleRequest;
use Carbon\Carbon;

class ArticlesController extends Controller
{
    //  Articles テーブルのデータ全てを抽出し、ビューに渡す
    public function index() {
        //$articles = Article::all();

        // ソート
        $articles = Article::latest('published_at')->latest('created_at')
            ->published()
            ->get();

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
    public function store(ArticleRequest $request)
    {
        // ここのvalidateは不要に
        /* $rules = [
            'title' => 'required|min:3',
            'body'=> 'required',
            'published_at' => 'required|date',
        ];
        $validated = $this->validate($request, $rules);
        Article::create($validated); */

        // コントローラの名前空間でファサードクラスを使うには、グローバルクラスとして指定する必要がある
        //$inputs = \Request::all();
        //Article::create($inputs);

        // デバッグ用
        //dd($inputs);

        Article::create($request->validated());
        return redirect('articles')->with('message', '記事を追加しました。');
    }

    public function edit($id) {
        $article = Article::findOrFail($id);

        return view('articles.edit', compact('article'));
    }

    public function update(ArticleRequest $request, $id) {
        $article = Article::findOrFail($id);

        $article->update($request->validated());

        return redirect(url('articles', [$article->id]))->with('message', '記事を修正しました。');
    }

    public function destroy($id) {
        $article = Article::findOrFail($id);
 
        $article->delete();
 
        return redirect('articles')->with('message', '記事を削除しました。');
    }
}
