<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Article;
use App\Tag;
use App\Http\Requests\ArticleRequest;
use Carbon\Carbon;


class ArticlesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')
            ->except(['index', 'show']);
    }

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
    public function show(Article $article) {
        return view('articles.show', compact('article'));
    }

    public function create()
    {
        $tag_list = Tag::pluck('name', 'id');

        return view('articles.create', compact('tag_list'));
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

        //Article::create($request->validated());

        // ユーザーごとの記事として保存
        $article = Auth::user()->articles()->create($request->validated());
        $article->tags()->attach($request->input('tags'));

        return redirect()->route('articles.index')->with('message', '記事を追加しました。');
    }

    public function edit(Article $article)
    {
        $tag_list = Tag::pluck('name', 'id');

        return view('articles.edit', compact('article', 'tag_list'));
    }

    public function update(Article $article, ArticleRequest $request)
    {
        $article->update($request->validated());
        $article->tags()->sync($request->input('tags'));

        return redirect()->route('articles.show', [$article->id])->with('message', '記事を修正しました。');
    }

    public function destroy(Article $article)
    {
        $article->delete();
 
        return redirect()->route('articles.index')->with('message', '記事を削除しました。');
    }
}
