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
        @if(Auth::id() == implode(config('app.admin')))
            <div class='store_edit' style='padding: 10px 50px;'>
                <a href='/stores/{{ $store->id }}/edit'>[編集]</a>
            </div>
        @endif
        
        @if(Auth::id() == implode(config('app.admin')))
            <form action="/stores/{{ $store->id }}" id="form_{{ $store->id }}" method="post" style="display:inline; padding: 20px 50px;">
                    @csrf
                    @method('DELETE')
                    <button type="submit", onclick="return deleteStore()">[削除]</button> 
            </form>
        @endif

        <div class='snack' style='padding: 10px 70px;'>
            <h3>お菓子一覧</h3>
            @foreach($snacks as $snack)
                <a href='/snacks/{{ $snack->id }}'>・{{ $snack->name }}</a><br>
            @endforeach
            <div class='paginate'>
                {{ $snacks->links('vendor.pagination.tailwind2') }}
            </div>
        </div>
        <div class='back' style='padding: 10px 50px;'>
            <a href='/stores'>[店一覧へ戻る]</a>
        </div>
        <script>
            function deleteStore() {
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