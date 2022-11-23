<x-app-layout>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>SnackExpl</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1 style='padding: 10px 30px;'>ブックマーク一覧</h1>
        <div class='bookmarked_comments'>
            @foreach ($comments as $comment)
                <div class='comment' style='padding: 20px 70px;'>
                    <h2 class='title'>
                        <a href='/comments/{{ $comment->id }}'>{{ $comment->title }}</a>
                    </h2>
                    <h3 class='snack'>
                        お菓子名：<a href='/snacks/{{ $comment->snack_id }}'>{{ $comment->snack->name }}</a>
                    </h3>
                </div>
            @endforeach
            <div class='paginate' style='padding: 0 0 0 70px;'>
                {{ $comments->links('vendor.pagination.tailwind2') }}
            </div>
        </div>
    </body>
</html>

</x-app-layout>