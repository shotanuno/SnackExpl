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
    <h1 class="title" style='padding: 20px 0 0 50px;'>コメントの編集画面</h1>
    <div class="content" style='padding: 20px 70px;'>
        <form action='{{ route('comment.update', ['comment' => $comment->id]) }}' method="POST">
            {{-- action='/comments/{{ $comment->id }}' でもいけるが、今回は名前付きルーティングを使用 --}}
            @csrf
            @method('PUT')
            <div class='content__title'>
                <h2>タイトル:</h2>
                <input type='text' name='comment[title]' value="{{ $comment->title }}">
                <p class='comment_title' style='color:red'>{{ $errors->first('comment.title') }}</p>
            </div>
            <div class='content__body'>
                <h2 style='padding: 10px 0 0 0;'>内容:</h2>
                <textarea name='comment[body]' style="width:40%; height:80px;">{{ $comment->body }}</textarea>
                <p class='comment_body' style='color:red'>{{ $errors->first('comment.body') }}</p>
            </div>
            <div class='content__average'>
                <h2>評価:</h2>
                <input type="number" name="comment[rating]" min="1" max="5"　value="{{ $comment->rating }}">
                <p class='comment_rating' style='color:red'>{{ $errors->first('comment.rating') }}</p>
                {{-- ratingのvalueがうまく機能していないので要修正 --}}
            </div>
            <input type="submit" value="保存">
        </form>
    </div>
    <div class='to_previous' style='padding: 10px 50px;'>
        <a href="{{ url()->previous() }}">[戻る]</a>
    </div>
</body>

</x-app-layout>