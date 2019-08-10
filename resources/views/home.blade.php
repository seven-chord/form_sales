@extends('layouts.app')
@section('content')


<div class="container">

    <!-- ------------営業開始ここから------------ -->
    <div class="sale_start_container">

            <!-- ------------from_company情報ここから------------ -->
            <table class="table from_company_container">
                <tr>
                    <th>会社名</th>
                    <td id="company_name">{{ $fromCompany->company_name }}</td>
                    <td class="copy_success">
                        <button class="btn company_name_clipboard" data-clipboard-target="#company_name">コピー</button>
                    </td>
                </tr>

                <tr>
                    <th>郵便番号</th>
                    <td id="postcode">{{ $fromCompany->postcode }}</td>
                    <td class="copy_success">
                        <button class="btn postcode_clipboard" data-clipboard-target="#postcode">コピー</button>
                    </td>
                </tr>

                <tr>
                    <th>住所</th>
                    <td id="address">{{ $fromCompany->address }}</td>
                    <td class="copy_success">
                        <button class="btn address_clipboard" data-clipboard-target="#address">コピー</button>
                    </td>
                </tr>

                <tr>
                    <th>電話番号</th>
                    <td id="telephone">{{ $fromCompany->telephone }}</td>
                    <td class="copy_success">
                        <button class="btn telephone_clipboard" data-clipboard-target="#telephone">コピー</button>
                    </td>
                </tr>

                <tr>
                    <th>ホームページURL</th>
                    <td id="homepage">{{ $fromCompany->homepage }}</td>
                    <td class="copy_success">
                        <button class="btn homepage_clipboard" data-clipboard-target="#homepage">コピー</button>
                    </td>
                </tr>


                <tr>
                    <th>email</th>
                    <td id="email">{{ $fromCompany->email }}</td>
                    <td class="copy_success">
                        <button class="btn email_clipboard" data-clipboard-target="#email">コピー</button>
                    </td>
                </tr>

                <tr>
                    <th>担当者</th>
                    <td id="person_in_charge">{{ $fromCompany->person_in_charge }}</td>
                    <td class="copy_success">
                        <button class="btn person_in_charge_clipboard" data-clipboard-target="#person_in_charge">コピー</button>
                    </td>
                </tr>

                <tr>
                    <th>フリガナ（姓）</th>
                    <td id="kana_sei">{{ $fromCompany->kana_sei }}</td>
                    <td class="copy_success">
                        <button class="btn kana_sei_clipboard" data-clipboard-target="#kana_sei">コピー</button>
                    </td>
                </tr>

                <tr>
                    <th>フリガナ（名）</th>
                    <td id="kana_mei">{{ $fromCompany->kana_mei }}</td>
                    <td class="copy_success">
                        <button class="btn kana_mei_clipboard" data-clipboard-target="#kana_mei">コピー</button>
                    </td>
                </tr>

                <tr>
                    <th>ふりがな</th>
                    <td id="furigana_hiragana">{{ $fromCompany->furigana_hiragana }}</td>
                    <td class="copy_success">
                        <button class="btn furigana_hiragana_clipboard" data-clipboard-target="#furigana_hiragana">コピー</button>
                    </td>
                </tr>

                <tr>
                    <th>フリガナ（全部）</th>
                    <td id="kana_full">{{ $fromCompany->kana_full }}</td>
                    <td class="copy_success">
                        <button class="btn kana_full_clipboard" data-clipboard-target="#kana_full">コピー</button>
                    </td>
                </tr>

                <tr>
                    <th>件名</th>
                    <td id="subject">{{ $fromCompany->subject }}</td>
                    <td class="copy_success">
                        <button class="btn subject_clipboard" data-clipboard-target="#subject">コピー</button>
                    </td>
                </tr>


                <tr>
                    <th>営業文</th>
                    <!-- <td>!! nl2bre$fromCompany->sales_letter !!</td> -->
                    <td id="sales_letter" class="sales_letter">{!!  nl2br(e($fromCompany->sales_letter)) !!}</td>
                    {{-- <td id="sales_letter_set">{!!  nl2br(e($fromCompany->sales_letter)) !!}</td> --}}
                    {{-- <input id="sales_letter_set" type="hidden" value="{!!  nl2br(e($fromCompany->sales_letter)) !!}"> --}}

                    <td class="copy_success">
                        <button class="btn sales_letter_set_btn" data-clipboard-text="{!!  $fromCompany->sales_letter !!}">コピー</button>
                    </td>
                </tr>

                <tr>
                    <th>営業文（URLなし）</th>
                    <!-- <td>!! nl2bre$fromCompany->sales_letter !!</td> -->
                    <td class="sales_letter_url_none">{!!  nl2br(e($fromCompany->sales_letter_url_none)) !!}</td>
                    {{-- <td id="sales_letter_set">{!!  nl2br(e($fromCompany->sales_letter_url_none)) !!}</td> --}}
                    {{-- <input id="sales_letter_set" type="hidden" value="{!!  nl2br(e($fromCompany->sales_letter_url_none)) !!}"> --}}

                    <td class="copy_success">
                        <button class="btn sales_letter_url_none_set_btn" data-clipboard-text="{!!  $fromCompany->sales_letter_url_none !!}">コピー</button>
                    </td>
                </tr>

                <tr>
                    <th>営業文（300文字以内）</th>
                    <!-- <td>!! nl2bre$fromCompany->sales_letter !!</td> -->
                    <td class="sales_letter_300_words">{!!  nl2br(e($fromCompany->sales_letter_url_none)) !!}</td>
                    {{-- <td id="sales_letter_set">{!!  nl2br(e($fromCompany->sales_letter_url_none)) !!}</td> --}}
                    {{-- <input id="sales_letter_set" type="hidden" value="{!!  nl2br(e($fromCompany->sales_letter_300_words)) !!}"> --}}

                    <td class="copy_success">
                        <button class="btn sales_letter_300_words_btn" data-clipboard-text="{!!  $fromCompany->sales_letter_300_words !!}">コピー</button>
                    </td>
                </tr>

                <tr>
                  <td><span class="btn btn-primary next_list_possible_button">送信完了->次の企業へ</span></td>
                  <td><span class="btn btn-primary next_list_impossible_button">送信不可->次の企業へ</span></td>
                  <td><span class="send_count"></span></td>
                </tr>

                <tr>
                   <td><span class="btn btn-primary return_list_button">一覧へ戻る</span></td>
                </tr>

            </table>

            <!-- ------------from_company情報ここまで------------ -->

            <!-- ------------to_company情報ここから------------ -->


            <div class="to_comapny_container" style="margin-left:20px;">
                     <iframe  class="to_comapny_page" style="width:130%;height:1300px;border-radius:5px;"></iframe>
            </div>


            <!-- ------------to_company情報ここまで------------ -->

        <!-- ------------営業開始ここまで------------ -->

    </div>



<!-- <div class="container"> -->
<div id="all_container">
    <div class="row justify-content-center">
        <div class="col-md-2">
            {{-- <h2>地域</h2>
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
            <hr> --}}
            <h3>送信元企業を選択</h3>
            <select class="form-control from-company">
                @forelse ($fromCompanies as $company)
                    <option value="{{ $company->id }}">{{ $company->company_name }}</option>
                @empty
                    <option value="">-</option>
                @endforelse
            </select>
            {{-- <hr>
            <button type="button" class="btn btn-primary">検索</button> --}}
            <hr>
            <p class="btn btn-primary sales_start_button">営業を開始する</p>
            <hr>
            <a class="btn btn-primary" href="{{ url('/to_companies/csv_import') }}" role="button">CSVインポート</a>
            <hr>
            <p class="btn btn-primary ajax_button">ajax</p>

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
                <tbody id="to_company_list">
                    @forelse ($toCompanies as $toCompany)
                        <tr>
                            <th scope="row" class="to_company_id">{{ $toCompany->id }}</th>
                            <td>{{ $toCompany->company_name }}</td>
                            <td>{{ $toCompany->address_1 }}</td>
                            <td>{{ $toCompany->address_2 }}</td>
                            <td>{{ $toCompany->telephone_1 }}</td>
                            <td>{{ $toCompany->categories }}</td>
                            <td class="to_company_url">{{ $toCompany->contact_url }}</td>
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
            {{$toCompanies->links()}}
        </div>
    </div>
</div>
</div>
@endsection
