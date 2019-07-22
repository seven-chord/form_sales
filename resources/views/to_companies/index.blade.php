<?php
    //検索して出てきた企業番号をセットする変数$company_indexを作成
    $url = url()->full();
    $url_page_value =  strchr($url, 'page=');
    if(!$url_page_value === false){
        $page_count = intval(str_replace('page=','',$url_page_value));
        $company_index = 1 + $pagenate_counts * ($page_count - 1);    
    }else{
        $company_index = 1;
    }
?>


<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <!-- <link rel="stylesheet" href="{{ asset('css/style.css')}}"> -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script type="text/javascript" src="js/jquery.js"></script>
        <!-- Styles -->
      
    </head>
    <body>
    <!-- 企業情報を取得 -->

    <style>
        .container-fluid {
            width:80%;
        }
    </style>



    <h2 class="from_copany_button">依頼企業</p>
    <h2 class="companies_list_button" style="display: none;">企業一覧</h2>


        <div class="container-fluid">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="col-md-auto">No</th>
                            <th class="col-md-auto">企業名</th>
                            <th class="col-md-auto">都道府県</th>
                            <th class="col-md-auto">住所</th>
                            <th class="col-md-auto">電話番号</th>
                            <th class="col-md-auto">カテゴリ</th>
                            <th class="col-md-auto">問い合わせURL</th>
                            <th class="col-md-auto">送信日</th>
                            <th class="col-md-auto">送信可否</th>
                        </tr>
                    </thead>
                    <tbody>
 
                    @foreach ($to_companies_order_get as $to_company)

                        <tr>
                            <td>{{ $company_index++ }}</td>
                            <td class="company_name">{{ $to_company->company_name }}</td>
                            <td class="address">{{ $to_company->address_1 }}</td>
                            <td>{{ $to_company->address_2 }}</td>
                            <td>{{ $to_company->telephone_1.'-'.$to_company->telephone_2.'-'.$to_company->telephone_3}}</td>
                            <td>{{ $to_company->categories }}</td>
                            <!-- <td><a href="{{ $to_company->contact_url }}">{{ $to_company->contact_url }}</a></td> -->
                            <td><a href="{{ 'https://www.google.com/?hl=ja' }}">{{ $to_company->contact_url }}</a></td>
                            <td>{{ $to_company->send_date }}</td>
                            <td>{{ $to_company->possible_send_flag }}</td>
                        </tr>

                    @endforeach
                    </tbody>
                </table>
                {{$to_companies_order_get->links()}}
            </div>


    <div class="from_company_info" style="display: none;">
        <ul>
            <li>株式会社</li>
            <li>住所</li>
            <li>電話番号</li>
            <li>Email</li>
            <li>商材情報</li>
        </ul>
    </div>

    <div class="to_company_info" style="display: none;">
        <iframe src="https://www.softbank.jp/" width="500" height="1000"></iframe>
    </div>


    </body>
</html>
