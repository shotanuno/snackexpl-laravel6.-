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
        <h1 class="title" style='padding: 0 0 0 30px;'>
            {{ $comment->title }}
        </h1>
        <h2 style='padding: 20px 70px;'>お菓子名：
            <a href="/snacks/{{ $comment->snack_id }}">
                {{ $comment->snack->name }}
            </a>
        </h2>
        <div class="content" style='padding: 0 0 0 70px;'>
            <div class="content__comment">
                <p>{{ $comment->body }}</p>
                <h2 class="rating">評価:{{ $comment->rating }}</h2>
            </div>
        </div>
        <p class="edit" style='padding: 0 0 0 50px;'>[<a href="/comments/{{ $comment->id }}/edit">編集</a>]</p>
        <form action="/comments/{{ $comment->id }}" id="form_{{ $comment->id }}" method="post" style="display:inline; padding: 0 0 0 50px;'">
            @csrf
            @method('DELETE')
            <button type="submit", onclick="return deleteComment()">delete</button> 
        </form>
        <div class="comment_bookmark" style='padding: 20px 0 0 50px;'>
            @if ($bookmark_list->contains($comment->id))
                <form action={{"/comments/" . $comment->id . "/unbookmark"}} method="POST" class="border-red-500">
                    <!-- action="/comments/{ $comment->id }/unbookmark"だと上手く認識されない -->
                    @csrf
                    <button type="submit"><img class="w-1/2" src="{{ asset('/image/red-heart.png') }}"></button>
                </form>
                <span>{{ $comment->users()->count() }}</span>
            @else
                <form action={{"/comments/" . $comment->id . "/bookmark"}} method="POST" class="border-red-500">
                    @csrf
                    <button type="submit"><img class="w-1/2" src="{{ asset('/image/gray-heart.png') }}"></button>
                </form>
                <span>{{ $comment->users()->count() }}</span>
            @endif
        </div>
        <div class="footer">
            <a href="/comments" style='padding: 10px 0 0 50px;'>投稿一覧へ戻る</a>
        </div>
        <script>
            function deleteComment() {
                "use strict"
                if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                return true;
                }
                return false;
            }
        </script>
    </body>
</html>

@endsection