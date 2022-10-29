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
        <h1>Blog Name</h1>
        <a href='/snacks/random'>Random Jump</a>
        <div class='snacks'>
            @foreach ($snacks as $snack)
                <div class='snack'>
                    <h2 class='name'>
                        <a href="/snacks/{{ $snack->id }}">{{ $snack->name }}</a>
                    </h2>
                    <p class='overview'>{{ $snack->overview }}</p>
                    <form action="/snacks/{{ $snack->id }}" id="form_{{ $snack->id }}" method="post" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit", onclick="return deleteSnack()">delete</button> 
                    </form>
                </div>
            @endforeach
        </div>
        <div class='paginate'>
            {{ $snacks->links() }}
        </div>
        <a href='/snacks/create'>お菓子の追加</a>
        <script>
            function deleteSnack() {
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