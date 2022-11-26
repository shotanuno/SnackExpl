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
            {{ $store->name }}
        </h1>
        <div class="image" style='padding: 10px 0 0 70px;'>
                <img src="{{ $image->image_path }}">
        </div>
        <div class="content" style='padding: 20px 70px;'>
            <div class="content__store">
                <h2>お店の概要</h2>
                <p>{{ $store->overview }}</p>
            </div>
        </div>
        <div class='comment'>
            <h3 style='padding: 10px 70px;'>お菓子一覧</h3>
            {{-- store毎のお菓子を表示するコード記述 --}}
            {{-- 上記のお菓子のペジネーションコード記述 --}}
        </div>
        
        {{-- お店の内容編集をするページへのリンクコードを記述 --}}
        
        {{-- 前のページへのリンクコードを記述 --}}
            
        </div>
    </body>
</html>

</x-app-layout>