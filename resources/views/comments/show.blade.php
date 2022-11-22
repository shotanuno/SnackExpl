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
        <div class='to_edit' style='padding: 10px 50px;'>
        <a href='/comments/{{ $comment->id }}/edit'>[口コミを編集]</a><br>
        </div>
        
        <form action='{{ route('comment.delete', ['comment' => $comment->id]) }}' id="form_{{ $comment->id }}" method="post" style="display:inline; padding: 10px 50px;">
            @csrf
            @method('DELETE')
            <button type="submit", onclick="return deleteComment()">[削除する]</button> 
        </form>
        
        {{-- コメントへのbookmark機能をここに記述 --}}
        
        <div class='to_previous' style='padding: 10px 50px;'>
            <a href="{{ url()->previous() }}">[戻る]</a>
        </div>
        
        <script>
            function deleteComment() {
                "use strict"
                if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                return true;
                }
                return false;
            }
        </script>
    </body>
</html>

</x-app-layout>