<x-app-layout>

<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>SnackExpl</title>
    </head>
    <body>
        <h1 style='padding: 20px 0 0 30px;'>お菓子の追加</h1>
        <form action="/snacks" method="POST" enctype="multipart/form-data" style='padding: 20px 70px;'>
            @csrf
            <div class="name">
                <h2>お菓子名:</h2>
                <input type="text" name="snack[name]" placeholder="公式の名称でお願いします" value="{{ old('snack.name') }}"/>
                <p class="name__error" style="color:red">{{ $errors->first('snack.name') }}</p>
            </div>
            <div class='store'>
                <h2>お店</h2>
                @foreach($stores as $store)
                    <input type="checkbox" name="store[]" id="{{ $store->id }}" value="{{ $store->id }}"><label for="{{ $store->id }}">  {{ $store->name }}<br></label>
                @endforeach
                <p class="store_error" style="color:red">{{ $errors->first('store[]') }}</p>
            </div>
            <div class="overview">
                <h2 style='padding: 20px 0 0 0;'>詳細:</h2>
                <textarea name="snack[overview]" placeholder="そのお菓子の詳細について記入してください" style="width:40%; height:80px;">{{ old('snack.overview') }}</textarea>
                <p class="overview__error" style="color:red">{{ $errors->first('snack.overview') }}</p>
            </div>
            <div class='image'>
                <h2 style='padding: 20px 0 0 0;'>画像:</h2>
                <input type="file" name="image">
                <p class='image_error' style='color:red'>{{ $errors->first('image') }}</p>
            </div>
            <input type="submit" value="保存" style='padding: 15px 0;'/>
        </form>
        <div class="back" style='padding: 0 0 0 50px;'>[<a href="/">戻る</a>]</div>
    </body>
</html>

</x-app-layout>