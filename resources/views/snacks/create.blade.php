<x-app-layout>

<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>SnackExpl</title>
    </head>
    <body>
        <h1 style='padding: 20px 0 0 30px;'>お菓子の追加</h1>
        <form action="/snacks" method="POST" enctype="multipart/form-data" style='padding: 20px 70px;'>
            @csrf
            <div class="name">
                <h2>お菓子名:</h2>
                <input type="text" name="snack[name]" placeholder="公式の名称でお願いします"/>
                <p class="name__error" style="color:red">{{ $errors->first('snack.name') }}</p>
            </div>
            <div class="overview">
                <h2 style='padding: 20px 0 0 0;'>詳細:</h2>
                <textarea name="snack[overview]" placeholder="そのお菓子の詳細について記入してください"></textarea>
                <p class="overview__error" style="color:red">{{ $errors->first('snack.overview') }}</p>
            </div>
            <div class='image'>
                <h2 style='padding: 20px 0 0 0;'>画像:</h2>
                {{-- 画像の追加フォームのコードをここに記述 --}}
            </div>
            <input type="submit" value="保存"/>
        </form>
        <div class="back" style='padding: 0 0 0 50px;'>[<a href="/">戻る</a>]</div>
    </body>
</html>

</x-app-layout>