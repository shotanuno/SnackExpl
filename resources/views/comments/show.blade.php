<x-app-layout>

<!DOCTYPE HTML>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>SnackExpl</title>

        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="/css/app.css">
    </head>
    <body>
        <div class='comment_title'>
            <h1 class="title" style='padding: 20px 0 0 50px;'>
                {{ $comment->title }}
            </h1>
        </div>
        <div class='snack_name'>
            <h2 style='padding: 20px 0 0 70px;'>お菓子名：
                <a href="/snacks/{{ $comment->snack_id }}">
                    {{ $comment->snack->name }}
                </a>
            </h2>
        </div>
        <div class="comment_body" style='padding: 10px 0 0 70px;'>
            <p>{{ $comment->body }}</p>
        </div>
        <div class='comment_rating'>
            <h2 class="rating" style='padding: 10px 0 0 70px;'>評価：{{ $comment->rating }}</h2>
        </div>
        
        {{-- コメントの編集ページへの導線をここに記述 --}}
        
        {{-- コメントの削除form,ボタンのコードをここに記述 --}}
        
        {{-- コメントへのbookmark機能をここに記述 --}}
        
        {{-- コメント一覧へ戻るための導線をここに記述 --}}
        
        {{-- コメント削除のスクリプトをここに記述 --}}
    </body>
</html>

</x-app-layout>