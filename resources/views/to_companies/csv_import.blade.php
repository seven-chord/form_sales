<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>企業リスト</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    </head>



    <body>
        <p>CSVファイルを選択してください</p>
        <form action="{{ url('/to_companies/csv_import')}}" method="POST" enctype="multipart/form-data" style="margin-bottom:20px;">
            {{ csrf_field() }}

            <input type="file" name="csv_file">
            <button type="submit">インポート</button>
        </form>

        <a href="{{url('/home')}}">ホームに戻る</a>

            
    </body>
</html>
