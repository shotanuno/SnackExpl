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
        <h1 class="name" style='padding: 10px 0 0 50px;'>
            {{ $snack->name }}
        </h1>
        {{-- お菓子の追加、表示機能をこの間に記述する --}}
        <div class="content" style='padding: 20px 70px;'>
            <div class="content__snack">
                <h2>コンビニ名</h2>
                {{-- コンビニ名をここに表示し、そのリンク先に飛べるようにするコードを記述 --}}
                <h2>お菓子の詳細</h2>
                <p>{{ $snack->overview }}</p>
                <h2>評価</h2>
                {{-- お菓子の評価をここに記述 --}}
            </div>
        </div>
        <h3 class="comment" style='padding: 20px 70px;'>このお菓子への投稿　最新10件</h3>
        {{-- このお菓子への投稿一覧の機能をここに記述 --}}
        
        <a href='/comments/{{ $snack->id }}/create' style='padding: 0 0 0 70px;'>[口コミを投稿]</a>
        
        <a href='/snacks/{{ $snack->id }}/edit' style='padding: 0 0 0 70px;'>[編集]</a>
        
        <div class="footer" style='padding: 20px 0 0 50px;'>
            <a href="/" >戻る</a>
        </div>
    </body>
</html>

</x-app-layout>