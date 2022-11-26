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
                @foreach ($store->images as $image)
                    <div class='store_name' style='padding: 50px 0 0 20%;'>
                        <a href='/stores/{{ $store->id }}'>
                            <font size='7'><p>{{ $store->name }}</p></font>
                        </a>
                    </div>
                    <div class='store_image'>
                        <img src="{{ $image->image_path }}" style='display: block; margin: auto; padding: 0 0 30px 0'>
                    </div>
                @endforeach
            @endforeach
        </div>
        
        {{-- storeの追加コードを記述 --}}
        
        {{-- store削除時scriptのコードを記述 --}}
    </body>
</html>

</x-app-layout>