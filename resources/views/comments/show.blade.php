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
        <div class="comment_body" style='padding: 10px 0 0 70px; white-space: pre-wrap;'>
            <p>{{ $comment->body }}</p>
        </div>
        <div class='comment_rating'>
            <h2 class="rating" style='padding: 10px 0 0 70px;'>評価：{{ $comment->rating }}</h2>
        </div>
        @if(Auth::id() === $comment->user_id || Auth::id() == implode(config('app.admin')))
            <div class='to_edit' style='padding: 10px 50px;'>
                <a href='/comments/{{ $comment->id }}/edit'>[口コミを編集]</a><br>
            </div>
            <form action='{{ route('comment.delete', ['comment' => $comment->id]) }}' id="form_{{ $comment->id }}" method="post" style="display:inline; padding: 10px 50px;">
                @csrf
                @method('DELETE')
                <button type="submit", onclick="return deleteComment()">[削除する]</button> 
            </form>
        @endif
        
        @auth
            <div class="comment_bookmark" style='padding: 20px 0 0 50px;'>
                @if ($bookmark_list->contains($comment->id))
                    <form action='{{ route('comment.unbookmark', ['comment' => $comment->id]) }}' method="POST" class="border-red-500">
                        <!-- action="/comments/{ $comment->id }/unbookmark"だと上手く認識されない -->
                        @csrf
                        <button type="submit"><img class="w-1/2" src="{{ asset('/image/bookmark.jpg') }}"></button>
                    </form>
                    <span>ブックマーク数：{{ $comment->users()->count() }}</span>
                @else
                    <form action='{{ route('comment.bookmark', ['comment' => $comment->id]) }}' method="POST" class="border-red-500">
                        @csrf
                        <button type="submit"><img class="w-1/2" src="{{ asset('/image/unbookmark.jpg') }}"></button>
                    </form>
                    <span>ブックマーク数：{{ $comment->users()->count() }}</span>
                @endif
            </div>
        @endauth
        
        @guest
            <div class='advise' style='padding: 10px 50px'>
                <p>ログインするとこの口コミをブックマークできます</p>
            </div>
        @endguest
        
        <div class='to_previous' style='padding: 10px 50px;'>
            <a href="/snacks/{{ $comment->snack->id }}">[{{ $comment->snack->name }}に戻る]</a>
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