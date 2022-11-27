<x-app-layout>

<!DOCTYPE HTML>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>SnackExpl</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="/css/app.css">
    </head>
    <body>
    <h1 class="title" style='padding: 10px 0 0 50px;'>店の編集画面</h1>
    <div class="content">
        <form action="/stores/{{ $store->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class='content__name' style='padding: 10px 70px;'>
                <h2>店名:</h2>
                <input type='text' name='store[name]'>
                <p class="name__error" style="color:red">{{ $errors->first('store.name') }}</p>
            </div>
            <div class='content__overview' style='padding: 10px 70px;'>
                <h2>詳細:</h2>
                <textarea name='store[overview]' ></textarea>
                <p class="overview__error" style="color:red">{{ $errors->first('store.overview') }}</p>
            </div>
            <input type="submit" value="保存" style='padding: 5px 70px;'>
        </form>
    </div>
    {{-- 前のページに戻るリンクのコードを記述 --}}
</body>

</x-app-layout>