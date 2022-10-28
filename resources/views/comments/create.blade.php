@extends('layouts.app')　　　　　　　　　　　　　　　　　　

@section('content')
{{Auth::user()->name}}
<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>SnackMenu</title>
    </head>
    <body>
        <h1 class="snack_name">{{ $snack->name }}</h1>
        <form action="/comments/{{ $snack->id }}" method="POST">
            @csrf
            <div class="title">
                <h2>タイトル:</h2>
                <input type="text" name="comment[title]" placeholder="タイトルを入力してください"/>
                <p class="title__error" style="color:red">{{ $errors->first('comment.title') }}</p>
            </div>
            <div class="body">
                <h2>内容:</h2>
                <textarea name="comment[body]" placeholder="コメントを記載"></textarea>
                <p class="body__error" style="color:red">{{ $errors->first('comment.body') }}</p>
                <h2>評価:</h2>
                <input type="number" name="comment[rating]" min="1" max="5"> 
                <p class="rating__error" style="color:red">{{ $errors->first('comment.rating') }}</p>
            <!-- ratig_averageについては未実装 -->
            </div>
            <input type="submit" value="保存"/>
        </form>
        <div class="back">[<a href="/snacks/{{ $snack->id }}">back</a>]</div>
    </body>
</html>

@endsection