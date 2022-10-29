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
    <h1 class="title">編集画面</h1>
    <div class="content">
        <form action="/comments/{{ $comment->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class='content__title'>
                <h2>タイトル:</h2>
                <input type='text' name='comment[title]' value="{{ $comment->title }}">
            </div>
            <div class='content__body'>
                <h2>内容:</h2>
                <input type='text' name='comment[body]' value="{{ $comment->body }}">
            </div>
            <div class='content__average'>
                <h2>評価:</h2>
                <input type="number" name="comment[rating]" min="1" max="5"　value="{{ $comment->body }}">
            </div>
            <input type="submit" value="保存">
        </form>
        <a href="/comments/{{ $comment->id }}">[キャンセル]</a>
    </div>
</body>

@endsection