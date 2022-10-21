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
                    <h2 class='name'>
                        <a href="/snacks/{{ $snack->id }}">{{ $snack->name }}</a>
                    </h2>
                    <p class='overview'>{{ $snack->overview }}</p>
                </div>
            @endforeach
        </div>
        <div class='paginate'>
            {{ $snacks->links() }}
        </div>
        [<a href='/snacks/create'>お菓子の追加</a>]
    </body>
</html>