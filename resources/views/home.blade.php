@extends('layouts.app')
@section('content')


<div class="container">

    <!-- ------------営業開始ここから------------ -->
    <div class="sale_start_container">

            <!-- ------------from_company情報ここから------------ -->
            <table class="table table-condensed from_company_container">
                <tr>
                    <th>項目名（ショートカット）</th>
                    <th>項目値</th>
                    <th>コピー</th>
                </tr>

                <tr>
                    <th>
                        <p id="company_name_shortcut">会社名</p>
                        <p id="company_name_kana_shortcut">会社名カナ</p>
                    </th>
                    <td>
                         <p id="company_name">{{ $fromCompany->company_name }}</p>
                         <p id="company_name_kana">{{ $fromCompany->company_name_kana }}</p>
                    </td>
                    <td class="copy_success">
                        <p><button class="company_name_clipboard" data-clipboard-text="{!! $fromCompany->company_name !!}">コピー</button></p>
                        <p><button class="company_name_kana_clipboard" data-clipboard-text="{!! $fromCompany->company_name_kana !!}">コピー</button></p>
                    </td>
                </tr>

                <tr>
                    <th id="postcode_shortcut">郵便番号</th>
                    <td id="postcode">{{ $fromCompany->postcode }}</td>
                    <td class="copy_success">
                        <button class="postcode_clipboard" data-clipboard-text="{!! $fromCompany->postcode !!}">コピー</button>
                    </td>
                </tr>

                <tr>
                    <th id="division_shortcut">事業部名</th>
                    <td id="division">{{ $fromCompany->division }}</td>
                    <td class="copy_success">
                        <button class="division_clipboard" data-clipboard-text="{!! $fromCompany->division !!}">コピー</button>
                    </td>
                </tr>

                <tr>
                    <th>
                        <p id="address_shortcut">住所</p>
                        <p id="municipalities_and_number_shortcut">市区町村-建物込</p>
                        <p id="municipalities_shortcut">市区町村</p>
                        <p id="building_name_shortcut">建物名</p>
                    </th>
                    <td>
                        <p id="address">{{ $fromCompany->address }}</p>
                        <p id="municipalities_and_number">{{ $fromCompany->municipalities_and_number }}</p>
                        <p id="municipalities">{{ $fromCompany->municipalities }}</p>
                        <p id="building_name">{{ $fromCompany->building_name }}</p>
                    </td>
                    <td class="copy_success">
                        <p><button class="address_clipboard" data-clipboard-text="{!! $fromCompany->address !!}">コピー</button></p>
                        <p><button class="municipalities_and_number_clipboard" data-clipboard-text="{!! $fromCompany->municipalities_and_number !!}">コピー</button></p>
                        <p><button class="municipalities_clipboard" data-clipboard-text="{!! $fromCompany->municipalities !!}">コピー</button></p>
                        <p><button class="building_name_clipboard" data-clipboard-text="{!! $fromCompany->building_name !!}">コピー</button></p>
                    </td>
                </tr>

                <tr>
                    <th id="telephone_shortcut">電話番号</th>
                    <td id="telephone">{{ $fromCompany->telephone }}</td>
                    <td class="copy_success">
                        <button class="telephone_clipboard" data-clipboard-text="{!! $fromCompany->telephone !!}">コピー</button>
                    </td>
                </tr>

                <tr>
                    <th id="homepage_shortcut">ホームページURL</th>
                    <td id="homepage">{{ $fromCompany->homepage }}</td>
                    <td class="copy_success">
                        <button class="homepage_clipboard" data-clipboard-text="{!! $fromCompany->homepage !!}">コピー</button>
                    </td>
                </tr>


                <tr>
                    <th id="email_shortcut">email</th>
                    <td id="email">{{ $fromCompany->email }}</td>
                    <td class="copy_success">
                        <button class="email_clipboard" data-clipboard-text="{!! $fromCompany->email !!}">コピー</button>
                    </td>
                </tr>

                <tr>
                    <th>
                        <p id="person_in_charge_shortcut">担当者-氏名</p>
                        <p id="person_in_charge_sei_shortcut">担当者-姓</p>
                        <p id="person_in_charge_mei_shortcut">担当者-名</p>
                    </th>
                    <td>
                        <p id="person_in_charge">{{ $fromCompany->person_in_charge }}</p>
                        <p id="person_in_charge_sei">{{ $fromCompany->person_in_charge_sei }}</p>
                        <p id="person_in_charge_mei">{{ $fromCompany->person_in_charge_mei }}</p>
                    </td>
                    <td class="copy_success">
                        <p><button class="person_in_charge_clipboard" data-clipboard-text="{!! $fromCompany->person_in_charge !!}">コピー</button></p>
                        <p><button class="person_in_charge_sei_clipboard" data-clipboard-text="{!! $fromCompany->person_in_charge_sei !!}">コピー</button></p>
                        <p><button class="person_in_charge_mei_clipboard" data-clipboard-text="{!! $fromCompany->person_in_charge_mei !!}">コピー</button></p>
                    </td>
                </tr>

                <tr>
                    <th>
                        <p id="kana_full_shortcut">フリガナ-氏名</p>
                        <p id="kana_sei_shortcut">フリガナ-姓</p>
                        <p id="kana_mei_shortcut">フリガナ-名</p>
                    </th>
                    <td>
                        <p id="kana_full">{{ $fromCompany->kana_full }}</p>
                        <p id="kana_sei">{{ $fromCompany->kana_sei }}</p>
                        <p id="kana_mei">{{ $fromCompany->kana_mei }}</p>
                    </td>
                    <td class="copy_success">
                        <p><button class="kana_full_clipboard" data-clipboard-text="{!! $fromCompany->kana_full !!}">コピー</button></p>
                        <p><button class="kana_sei_clipboard" data-clipboard-text="{!! $fromCompany->kana_sei !!}">コピー</button></p>
                        <p><button class="kana_mei_clipboard" data-clipboard-text="{!! $fromCompany->kana_mei !!}">コピー</button></p>
                    </td>
                </tr>


                <tr>
                    <th>
                        <p id="furigana_hiragana_shortcut">ふりがな-氏名</p>
                        <p id="furigana_sei_shortcut">ふりがな-姓</p>
                        <p id="furigana_mei_shortcut">ふりがな-名</p>
                    </th>
                    <td>
                        <p id="furigana_hiragana">{{ $fromCompany->furigana_hiragana }}</p>
                        <p id="furigana_sei">{{ $fromCompany->furigana_sei }}</p>
                        <p id="furigana_mei">{{ $fromCompany->furigana_mei }}</p>
                    </td>
                    <td class="copy_success">
                        <p><button class="furigana_hiragana_clipboard" data-clipboard-text="{!! $fromCompany->furigana_hiragana !!}">コピー</button></p>
                        <p><button class="furigana_sei_clipboard" data-clipboard-text="{!! $fromCompany->furigana_sei !!}">コピー</button></p>
                        <p><button class="furigana_mei_clipboard" data-clipboard-text="{!! $fromCompany->furigana_mei !!}">コピー</button></p>
                    </td>
                </tr>


                <tr>
                    <th id="subject_shortcut">件名</th>
                    <td id="subject">{{ $fromCompany->subject }}</td>
                    <td class="copy_success">
                        <button class="subject_clipboard" data-clipboard-text="{!! $fromCompany->subject !!}">コピー</button>
                    </td>
                </tr>


                <tr>
                    <th id="sales_letter_shortcut">営業文</th>
                    <td id="sales_letter" class="sales_letter_short">{!!  nl2br(e($fromCompany->sales_letter)) !!}</td>
                    {{-- <td id="sales_letter_set">{!!  nl2br(e($fromCompany->sales_letter)) !!}</td> --}}
                    {{-- <input id="sales_letter_set" type="hidden" value="{!!  nl2br(e($fromCompany->sales_letter)) !!}"> --}}

                    <td class="copy_success">
                        <button class="sales_letter_clipboard" data-clipboard-text="{!!  $fromCompany->sales_letter !!}">コピー</button>
                        <!-- <button class="btn sales_letter_set_btn" data-clipboard-text="#sales_letter">コピー</button> -->

                    </td>
                </tr>

                <tr>
                    <th id="sales_letter_url_none_shortcut">営業文-URLなし</th>
                    <!-- <td>!! nl2bre$fromCompany->sales_letter !!</td> -->
                    <td id="sales_letter_url_none">{!!  nl2br(e($fromCompany->sales_letter_url_none)) !!}</td>
                    {{-- <td id="sales_letter_set">{!!  nl2br(e($fromCompany->sales_letter_url_none)) !!}</td> --}}
                    {{-- <input id="sales_letter_set" type="hidden" value="{!!  nl2br(e($fromCompany->sales_letter_url_none)) !!}"> --}}

                    <td class="copy_success">
                        <button class="sales_letter_url_none_clipboard" data-clipboard-text="{!!  $fromCompany->sales_letter_url_none !!}">コピー</button>
                    </td>
                </tr>

                <tr>
                    <th id="sales_letter_300_words_shortcut">営業文-300文字</th>
                    <!-- <td>!! nl2bre$fromCompany->sales_letter !!</td> -->
                    <td id="sales_letter_300_words">{!!  nl2br(e($fromCompany->sales_letter_url_none)) !!}</td>
                    {{-- <td id="sales_letter_set">{!!  nl2br(e($fromCompany->sales_letter_url_none)) !!}</td> --}}
                    {{-- <input id="sales_letter_set" type="hidden" value="{!!  nl2br(e($fromCompany->sales_letter_300_words)) !!}"> --}}

                    <td class="copy_success">
                        <button class="sales_letter_300_words_clipboard" data-clipboard-text="{!!  $fromCompany->sales_letter_300_words !!}">コピー</button>
                    </td>
                </tr>

                <tr>
                    <td>
                        <span class="btn btn-primary next_list_possible_button next_list_btn">
                                <p>送信完了->次の企業へ</p>
                                <p class="next_list_shortcut">（Shift + Enter）</p>
                        </span>
                    </td>

                    <td>
                        <span class="btn btn-primary next_list_impossible_button next_list_btn">
                            <p>送信不可->次の企業へ</p>
                            <p class="next_list_shortcut">（Shift + Tab）</p>
                        </span>
                    </td>
                </tr>
                <tr>
                    <td>送信先企業総数：<span id="to_company_mail_all"></span></td>
                    <td><span class="send_count"></span></td>
                </tr>

                <tr>
                   <td><span class="btn btn-primary return_list_button">一覧へ戻る</span></td>
                </tr>

            </table>

            <!-- ------------from_company情報ここまで------------ -->

            <!-- ------------to_company情報ここから------------ -->


            <div class="to_comapny_container" style="margin-left:20px;">
                     <iframe  id="to_comapny_page" style="width:130%;height:1000px;border-radius:5px;"></iframe>
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
            <form action="{{ url('/to_companies/from_company_project_change') }}" method="POST">
            {{ csrf_field() }}
                    <select class="form-control from-company" name="from_company_id" >
                        @forelse ($fromCompanies as $company)
                            <option value="{{ $company->id }}" >{{ $company->project_name }}</option>
                        @empty
                            <option value="">-</option>
                        @endforelse
                    </select>
                    <hr>
                    <!-- <input type="text" name="test"> -->
                    <button type="submit" class="btn btn-primary">変更</button>
            </form>
            <hr>
                <p class="btn btn-primary sales_start_button">営業を開始する</p>
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
