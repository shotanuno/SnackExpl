<x-app-layout>

<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>SnackExpl</title>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1 class="snack_name" style='padding: 10px 0 0 30px;'>{{ $snack->name }}</h1>
        <form action="/comments/{{ $snack->id }}" method="POST" style='padding: 20px 70px;'>
            @csrf
            <div class="title">
                <h2>タイトル:</h2>
                <input type="text" name="comment[title]" placeholder="タイトルを入力してください"/>
                {{-- タイトルのバリデーションコード --}}
            </div>
            <div class="body">
                <h2 style='padding: 10px 0 0 0;'>内容:</h2>
                <textarea name="comment[body]" placeholder="コメントを記載"></textarea>
                {{-- ボディのバリデーションコード --}}
                <h2 style='padding: 10px 0 0 0;'>評価:</h2>
                <input type="number" name="comment[rating]" min="1" max="5"> 
                {{-- 評価のバリデーションコード --}}
            </div>
            <input type="submit" value="保存" style='padding: 10px 0 0 0;' />
        </form>
        {{-- 前のページとの導線をここに追加 --}}
    </body>
</html>

</x-app-layout>