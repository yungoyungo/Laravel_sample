@extends('layout')

@section('content')
    <h1>
        {{ $article->title }}
    </h1>
    
    <hr/>

    <article>
        <div class="body">{{ $article->body }}</div>
    </article>

    @unless($article->tags->isEmpty())
        <h5>Tags:</h5>
        <ul>
            @foreach($article->tags as $tag)
                <li>{{ $tag->name }}</li>
            @endforeach
        </ul>
    @endunless

    @unless($article->comments->isEmpty())
        <h5>Comments:</h5>
        <ul>
            @foreach($article->comments as $comment)
                <li>{{ $comment->body }}</li>
            @endforeach
        </ul>
    @endunless
 
    <br/>
 
    @auth
        <a href="{{ action('ArticlesController@edit', [$article->id]) }}" class="btn btn-primary">編集</a>

        {!! delete_form(['articles', $article->id]) !!}
    @endauth

    <a href="{{ route('articles.index') }}" class="btn btn-secondary float-right">一覧へ戻る</a>
@endsection
