<x-app-layout>

<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>SnackExpl</title>
    </head>
    <body>
        <h1 style='padding: 10px 50px;'>お店の追加</h1>
        <form action="/snacks" method="POST" enctype="multipart/form-data" style='padding: 20px 70px;'>
            @csrf
            <div class="name">
                <h2>店名:</h2>
                <input type="text" name="store[name]" placeholder="公式の名称でお願いします" />
                {{-- バリデーションエラー時に表示される文を記述 --}}
            </div>
            <div class="overview">
                <h2 style='padding: 20px 0 0 0;'>詳細:</h2>
                <textarea name="store[overview]" placeholder="そのお店の詳細について記入してください"></textarea>
                {{-- バリデーションエラー時に表示される文を記述 --}}
            </div>
            <div class='image'>
                <h2 style='padding: 20px 0 0 0;'>画像:</h2>
                {{-- バリデーションエラー時に表示される文を記述 --}}
                <input type="file" name="image">
                
            </div>
            <input type="submit" value="保存" style='padding: 15px 0;'/>
        </form>
        <div class="back" style='padding: 0 0 0 50px;'><a href='/stores'>戻る</a></div>
    </body>
</html>

</x-app-layout>