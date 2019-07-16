@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-2">
            <form action="{{ route('home.search') }}" method="POST">
                @csrf
                <h2>地域</h2>
                <select class="form-control" name="prefecture_id">
                        <option value="">-</option>
                    @foreach ($prefectures as $prefecture)
                        <option value="{{ $prefecture->id }}">{{ $prefecture->name }}</option>
                    @endforeach
                </select>
                <hr>
                <h2>カテゴリ</h2>
                <select class="form-control" name="category_id">
                        <option value="">-</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                <hr>
                <button type="submit" class="btn btn-primary">検索</button>
            </form>
            <hr>
            <a class="btn btn-primary" href="{{ url('/to_companies/csv_import') }}" role="button">CSVインポート</a>
        </div>
        <div class="col-md-10">
            @if (session('success'))
                <div class="alert alert-danger" role="alert">
                        {{ session('success') }}
                </div>
            @endif
            <table class="table">
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
                                <form action="{{ route('to_companies.hide', $toCompany->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-warning btn-sm">
                                        非表示
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            データが登録されていません。
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
