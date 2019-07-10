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

            <ul>
                <li>{{ $to_company->company_name }}</li>
                <li>{{ $to_company->address_1 }}</li>
                <li>{{ $to_company->address_2 }}</li>            
                <li>{{ $to_company->telephone_1 }}</li>            
                <li>{{ $to_company->telephone_2 }}</li>            
                <li>{{ $to_company->telephone_3 }}</li>            
                <li>{{ $to_company->categories }}</li>  
                <li><a href="{{ $to_company->contact_url }}">{{ $to_company->contact_url }}</a></li>                      
            </ul>

        @endforeach
    </body>
</html>
