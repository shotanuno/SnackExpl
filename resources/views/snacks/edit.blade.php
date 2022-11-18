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
    <h1 class="title" style='padding: 10px 0 0 30px;'>お菓子の編集画面</h1>
    <div class="content" style='padding: 20px 70px;'>
        <form action="/snacks/{{ $snack->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class='content__name'>
                <h2>お菓子名:</h2>
                <input type='text' name='snack[name]' value="{{ $snack->name }}">
                <p class="name__error" style="color:red">{{ $errors->first('snack.name') }}</p>
            </div>
            <div class='content__overview'>
                <h2>詳細:</h2>
                <textarea name='snack[overview]' >{{ $snack->overview }}</textarea>
                <p class="overview__error" style="color:red">{{ $errors->first('snack.overview') }}</p>
            </div>
            <input type="submit" value="保存">
        </form>
    </div>
    <div class="footer" style='padding: 0 0 0 50px;'>
        <a href="/" >戻る</a>
    </div>
</body>

</x-app-layout>