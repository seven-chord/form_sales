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
        <h3>create</h3>
        <form action="{{ url('/to_companies')}}" method="POST">
            {{ csrf_field() }}
            <p>会社名 <input type="text" name="company_name"></p>
            <p>住所1 <input type="text" name="address_1"></p>
            <p>住所2 <input type="text" name="address_2"></p>
            <p>電話番号1 <input type="text" name="telephone_1"></p>
            <p>電話番号2 <input type="text" name="telephone_2"></p>
            <p>電話番号3 <input type="text" name="telephone_3"></p>
            <p>カテゴリー <input type="text" name="categories"></p>
            <p>問い合わせURL <input type="text" name="contact_url"></p>
            <button type="submit">送信</button>
    </body>
</html>
