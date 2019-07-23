@extends('layouts.app')
@section('content')


<style>
.test{
    display:none;
}

.container{
    display:flex;
}
.table{
    width:50%;
}

.to_comapny_container{
    width:50%;
}

.clipboard-success {
  display: none;
  margin: 0 0 0 8px;
  font-size: .9em;
}
</style>

<div class="container">
    <table class="table">
    @forelse ($fromCompanies as $fromCompany)
        <tr>
            <th>会社名</th>
            <td id="company_name">{{ $fromCompany->company_name}}</td>
            <td class="copy_success">
                <button class="btn btn_company_name_clipboard" data-clipboard-target="#company_name">コピー</button>
            </td>
        </tr>

        <tr>
            <th>郵便番号</th>
            <td id="postcode">{{ $fromCompany->postcode}}</td>
            <td class="copy_success">
                <button class="btn postcode_clipboard" data-clipboard-target="#postcode">コピー</button>
            </td>
        </tr>

        <tr>
            <th>住所</th>
            <td id="address">{{ $fromCompany->address}}</td>
            <td class="copy_success">
                <button class="btn address_clipboard" data-clipboard-target="#address">コピー</button>
            </td>
        </tr>

        <tr>
            <th>電話番号</th>
            <td>{{ $fromCompany->telephone}}</td>
            <td class="copy_success">
                <button class="btn btn_company_name_clipboard" data-clipboard-target="#company_name">コピー</button>
            </td>
        </tr>

        <tr>
            <th>ホームページURL</th>
            <td>{{ $fromCompany->homepage}}</td>
            <td class="copy_success">
                <button class="btn btn_company_name_clipboard" data-clipboard-target="#company_name">コピー</button>
            </td>
        </tr>


        <tr>
            <th>email</th>
            <td>{{ $fromCompany->email}}</td>
            <td class="copy_success">
                <button class="btn btn_company_name_clipboard" data-clipboard-target="#company_name">コピー</button>
            </td>
        </tr>

        <tr>
            <th>営業文</th>
            <td>{!! nl2br(e($fromCompany->sales_letter)) !!}</td>
            <td class="copy_success">
                <button class="btn btn_company_name_clipboard" data-clipboard-target="#company_name">コピー</button>
            </td>

        </tr>



        @empty
           <tr>
                 データが登録されていません。
           </tr>
        @endforelse

    </table>

    <div class="to_comapny_container">あああ</div>

</div>


<!-- <div class="container"> -->
<div class="test">

    <div class="row justify-content-center">
        <div class="col-md-2">
            <h2>地域</h2>
            <select class="form-control">
                @forelse ($prefectures as $prefecture)
                    <option value="{{ $prefecture->id }}">{{ $prefecture->name }}</option>
                @empty
                    <option value="">-</option>
                @endforelse
            </select>
            <hr>
            <h2>カテゴリ</h2>
            <select class="form-control">
                @forelse ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @empty
                    <option value="">-</option>
                @endforelse
            </select>
            <hr>
            <button type="button" class="btn btn-primary">検索</button>
            <hr>
            <p class="btn btn-primary">営業を開始する</p>
            <hr>
            <a class="btn btn-primary" href="{{ url('/to_companies/csv_import') }}" role="button">CSVインポート</a>

        </div>

        <!-- カラム -->
        <div class="col-md-10">
            <table class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col">No</th>
                    <th scope="col">企業名</th>
                    <th scope="col">都道府県</th>
                    <th scope="col">住所</th>
                    <th scope="col">電話番号</th>
                    <th scope="col">カテゴリ</th>
                    <th scope="col">問い合わせURL</th>
                    <th scope="col">送信日	</th>
                    <th scope="col">送信可否</th>
                    <th scope="col"></th>
                    </tr>
                </thead>

        <!-- 企業情報一覧表示ここから -->
                <tbody>
                    @forelse ($toCompanies as $toCompany)
                        <tr>
                            <th scope="row">{{ $toCompany->id }}</th>
                            <td>{{ $toCompany->company_name }}</td>
                            <td>{{ $toCompany->address_1 }}</td>
                            <td>{{ $toCompany->address_2 }}</td>
                            <td>{{ $toCompany->telephone_1 }}</td>
                            <td>{{ $toCompany->categories }}</td>
                            <td>{{ $toCompany->contact_url }}</td>
                            <td>{{ $toCompany->send_date }}</td>
                            <td>{{ $toCompany->possible_send_flag }}</td>
                            <td>
                                <a class="btn btn-warning" href="#" role="button">非表示</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            データが登録されていません。
                        </tr>
                    @endforelse
                </tbody>

        <!-- 企業情報一覧表示ここまで -->
            </table>
        </div>
    </div>
</div>
@endsection
