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
                    <form action="/snacks/{{ $snack->id }}" id="form_{{ $snack->id }}" method="post" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit", onclick="return deleteSnack()" style='padding: 10px 0 0 0;'>[削除]</button> 
                    </form>
                </div>
            @endforeach
        </div>
        <div class='paginate' style='padding: 0 0 0 70px;'>
            {{ $snacks->links() }}
        </div>
        
        @if(Auth::id() == implode(config('app.admin')))
            <a href='/snacks/create' style='padding: 0 0 0 50px;'>[お菓子の追加]</a>
        @endif
        {{-- divで<a>タグを囲む --}}
        
        <script>
            function deleteSnack() {
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