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
        <div class="image" style='padding: 10px 30px;'>
            @foreach($images as $image)
                <img src="{{ $image->image_path }}">
            @endforeach
            <h2 style='padding: 10px 0 0 30px;'>お菓子の画像を追加する</h2>
            <form action='/snacks/{{ $snack->id }}' method='POST' enctype='multipart/form-data'>
                @csrf
                <div class='add_image'>
                    <input type="file" name="image"/>
                    <input type="submit" value="追加"/>
                    <p style='color:red'>{{ $errors->first('image') }}</p>
                </div>
            </form>
        </div>
        <div class="content" style='padding: 0 70px;'>
            <div class="content__snack">
                <h2>店名</h2>
                @foreach($snack->stores as $store)
                    <div class='store' style='padding: 10px 0;'>
                        <a href='/stores/{{ $store->id }}'>・{{ $store->name }}</a>
                    </div>
                @endforeach
                <h2>お菓子の詳細</h2>
                <p>{{ $snack->overview }}</p>
                <h2>評価：{{ $rating }}</h2>
            </div>
        </div>
        <div class='comment'>
            <h3 style='padding: 10px 70px;'>このお菓子への投稿　最新10件</h3>
            @foreach($comments as $comment)
                <div class='comment_content' style='padding: 5px 70px;'>
                    <a href="/comments/{{ $comment->id }}">{{ $comment->title }}</a><br>
                </div>
            @endforeach  
            <div class='paginate' style='padding: 0 0 0 70px;'>
                {{ $comments->links('vendor.pagination.tailwind2') }}
            </div>
        </div>
        
        @auth
            <a href='/comments/{{ $snack->id }}/create' style='padding: 0 0 0 70px;'>[口コミを投稿]</a>
            {{-- divで<a>タグを囲む --}}
        @endauth
        
        @if(Auth::id() == implode(config('app.admin')))
            <a href='/snacks/{{ $snack->id }}/edit' style='padding: 10px 70px;'>[編集]</a>
        @endif
        {{--
        <div class='edit' style='padding: 10px 70px;'>
            <a href='/snacks/{{ $snack->id }}/edit'>[編集]</a>
        </div>
        --}}
        <div class="footer" style='padding: 20px 0 0 50px;'>
            <a href="/" >戻る</a>
        </div>
    </body>
</html>

</x-app-layout>