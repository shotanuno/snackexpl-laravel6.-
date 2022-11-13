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
        <h1 style='padding: 10px 0 0 30px;'>Snack Name</h1>
        <form action="/snacks" method="POST" enctype="multipart/form-data" style='padding: 20px 70px;'>
            @csrf
            <div class="name">
                <h2>お菓子名:</h2>
                <input type="text" name="snack[name]" placeholder="公式の名称でお願いします"/>
                <p class="name__error" style="color:red">{{ $errors->first('snack.name') }}</p>
            </div>
            <div class="overview">
                <h2>詳細:</h2>
                <textarea name="snack[overview]" placeholder="そのお菓子の詳細について記入してください"></textarea>
                <p class="overview__error" style="color:red">{{ $errors->first('snack.overview') }}</p>
            </div>
            <div class='image'>
                <input type="file" name="image"/>
                <p class="image__error" style="color:red">{{ $errors->first('image') }}</p>
                <!-- imageのバリデーションは未実装 -->
            </div>
            <input type="submit" value="保存"/>
        </form>
        <div class="back" style='padding: 0 0 0 50px;'>[<a href="/">back</a>]</div>
    </body>
</html>

@endsection