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
        <div class='snacks'>
            @foreach ($snacks as $snack)
                <div class='snack'>
                    <h2 class='name'>{{ $snack->name }}</h2>
                    <p class='overview'>{{ $snack->overview }}</p>
                </div>
            @endforeach
        </div>
    </body>
</html>