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
        <h1 class="name">
            {{ $snack->name }}
        </h1>
        <div class="image">
            <img src="{{ $image->image_path }}">
        </div>
        <div class="content">
            <div class="content__snack">
                <h2>お菓子の詳細</h2>
                <p>{{ $snack->overview }}</p>
                <h2>評価</h2>
                <p class='rating_average'>{{ $snack->rating_average }}</p>    
            </div>
        </div>
        <p class="comment_create">[<a href='/comments/{{ $snack->id }}/create'>このお菓子にコメントする</a>]</p>
        <h3 class="comment">このお菓子への投稿　最新10件</h3>
        @foreach ($comments as $comment)
            <div class="snack_comment">
                <a href="/comments/{{ $comment->id }}">{{ $comment->title }}</a>
            </div>
        @endforeach
        
        <p class="edit">[<a href="/snacks/{{ $snack->id }}/edit">編集</a>]</p>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</html>

@endsection