<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
      
    </head>
    <body>
        <h1>企業情報一覧</h1>
        @foreach ($to_companies_order_get as $to_company)
            <div>{{ $to_company->company_name }}</div>
            <div>{{ $to_company->address_1 }}</div>
        @endforeach
    </body>
</html>
