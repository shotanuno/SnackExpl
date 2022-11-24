<x-app-layout>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>SnackExpl</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        
        <h1 style='padding: 10px 50px;'>お店一覧</h1>
        <div class='stores'>
            @foreach ($stores as $store)
                <div class='store' style='padding: 20px 70px;'>
                    {{-- 各store毎のimagesを表示--}}
                    <h2 class='name'>
                        {{--　<a href="/stores/{{ $store->id }}">{{ $store->name }}</a> --}}
                    </h2>
                </div>
            @endforeach
        </div>
        
        {{-- storeの追加コードを記述 --}}
        
        {{-- store削除時scriptのコードを記述 --}}
    </body>
</html>

</x-app-layout>