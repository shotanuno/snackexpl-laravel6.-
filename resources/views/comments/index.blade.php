@extends('layouts.app')　　　　　　　　　　　　　　　　　　

@section('content')
{{Auth::user()->name}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <a href="/comments/bookmarked">ブックマーク一覧</a>
        <h1 style='padding: 10px 30px;'>Blog name</h1>
        <div class='cooments' style='padding: 20px 70px;'>
            @foreach ($comments as $comment)
                <div class='comment'>
                    <h2 class='title'>
                        <a href='/comments/{{ $comment->id }}'>{{ $comment->title }}</a>
                    </h2>
                    
                    <p class='body'>{{ $comment->body }}</p>
                </div>
            @endforeach
            <div class='paginate'>
            {{ $comments->links() }}
            </div>
        </div>
    </body>
</html>

@endsection