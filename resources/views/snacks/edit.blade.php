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
        <form action="/snacks/{{ $snack->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class='content__name'>
                <h2>お菓子名:</h2>
                <input type='text' name='snack[name]' value="{{ $snack->name }}">
                <p class="name__error" style="color:red">{{ $errors->first('snack.name') }}</p>
            </div>
            <div class='content__overview'>
                <h2>詳細:</h2>
                <textarea name='snack[overview]' value="{{ $snack->overview }}"></textarea>
                <p class="overview__error" style="color:red">{{ $errors->first('snack.overview') }}</p>
            </div>
            <input type="submit" value="保存">
        </form>
    </div>
</body>

@endsection