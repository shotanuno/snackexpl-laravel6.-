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
        <h1 class="name" style='padding: 10px 0 0 30px;'>
            {{ $snack->name }}
        </h1>
        <div class="image" style='padding: 10px 0 0 30px;'>
        @foreach($images as $image)
            <img src="{{ $image->image_path }}">
        @endforeach
            <h2 style='padding: 10px 0 0 30px;'>お菓子の画像を追加する</h2>
            <form action="/snacks/{{ $snack->id }}" method="POST" enctype="multipart/form-data">
                @csrf    
                <div class='image' style='padding: 10px 0 0 30px;'>
                    <input type="file" name="image"/>
                    <input type="submit" value="保存"/>
                </div>
            </form>
        </div>
        <div class="content" style='padding: 20px 70px;'>
            <div class="content__snack">
                <h2>お菓子の詳細</h2>
                <p>{{ $snack->overview }}</p>
                <h2>評価</h2>
                <p class='rating_average'>{{ $rating }}</p>    
            </div>
        </div>
        <h3 class="comment" style='padding: 20px 70px;'>このお菓子への投稿　最新10件</h3>
        @foreach ($comments as $comment)
            <div class="snack_comment" style='padding: 20px 70px;'>
                <a href="/comments/{{ $comment->id }}">{{ $comment->title }}</a>
            </div>
        @endforeach
        <p class="comment_create" style='padding: 0 0 0 50px;'>[<a href='/comments/{{ $snack->id }}/create'>このお菓子にコメントする</a>]</p>
        <p class="edit" style='padding: 0 0 0 50px;'>[<a href="/snacks/{{ $snack->id }}/edit">編集</a>]</p>
        <div class="footer" style='padding: 0 0 0 50px;'>
            <a href="/" >戻る</a>
        </div>
    </body>
</html>

@endsection