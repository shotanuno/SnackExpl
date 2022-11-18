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
        
        <h1 style='padding: 10px 30px;'>お菓子の一覧</h1>
        <div class='snacks'>
            @foreach ($snacks as $snack)
                <div class='snack' style='padding: 20px 70px;'>
                    <h2 class='name'>
                        <a href="/snacks/{{ $snack->id }}">{{ $snack->name }}</a>
                    </h2>
                    <p class='overview'>{{ $snack->overview }}</p>
                    {{-- お菓子の削除ボタンのコードをこの行に作成(policy使用)--}}
                </div>
            @endforeach
        </div>
        <div class='paginate' style='padding: 0 0 0 70px;'>
            {{ $snacks->links() }}
        </div>
        <a href='/snacks/create' style='padding: 0 0 0 50px;'>[お菓子の追加]</a>
        
        {{-- お菓子削除時に表示されるscriptのコードをここに記述 --}}
    </body>
</html>

</x-app-layout>