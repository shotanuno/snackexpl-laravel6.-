@extends('layouts.app')　　　　　　　　　　　　　　　　　　

@section('content')
{{Auth::user()->name}}
<!DOCTYPE HTML>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>SnacksDetail</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="/css/app.css">
    </head>
    <body>
        <h1 class="title">
            {{ $comment->title }}
        </h1>
        <h2>お菓子名：
            <a href="/snacks/{{ $comment->snack_id }}">
                {{ $comment->snack->name }}
            </a>
        </h2>
        <div class="content">
            <div class="content__comment">
                <p>{{ $comment->body }}</p>
                <h2 class="rating">評価:{{ $comment->rating }}</h2>
            </div>
        </div>
        <p class="edit">[<a href="/comments/{{ $comment->id }}/edit">編集</a>]</p>
        <div class="footer">
            <a href="/comments">投稿一覧へ戻る</a>
        </div>
    </body>
</html>

@endsection