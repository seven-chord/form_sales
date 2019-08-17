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
                        <p>会社名（ショートカット）</p>
                        <p>会社名カナ（ショートカット）</p>
                    </th>
                    <td>
                         <p class="short_character">{{ $fromCompany->company_name }}</p>
                         <p class="short_character">{{ $fromCompany->company_name_kana }}</p>
                    </td>
                    <td class="copy_success">
                        <p><button class="company_name_clipboard" data-clipboard-text="{!! $fromCompany->company_name !!}">コピー</button></p>
                        <p><button class="company_name_kana_clipboard" data-clipboard-text="{!! $fromCompany->company_name_kana !!}">コピー</button></p>
                    </td>
                </tr>

                <tr>
                    <th>
                        <p>郵便番号（ショートカット）</p>
                    </th>
                    <td class="postcode">{{ $fromCompany->postcode }}</td>
                    <td class="copy_success">
                        <button class="postcode_clipboard" data-clipboard-text="{!! $fromCompany->postcode !!}">コピー</button>
                    </td>
                </tr>

                <tr>
                    <th>
                        <p>事業部名（ショートカット）</p>
                    </th>
                    <td class="short_character">{{ $fromCompany->division }}</td>
                    <td class="copy_success">
                        <button class="division_clipboard" data-clipboard-text="{!! $fromCompany->division !!}">コピー</button>
                    </td>
                </tr>

                <tr>
                    <th>
                        <p>住所（）</p>    
                        <p>市区町村-建物込（）</p>    
                        <p>市区町村（）</p>    
                        <p>建物名（）</p>    
                    </th>
                    <td>
                        <p class="short_character">{{ $fromCompany->address }}</p>
                        <p class="short_character">{{ $fromCompany->municipalities_and_number }}</p>
                        <p class="short_character">{{ $fromCompany->municipalities }}</p>
                        <p class="short_character">{{ $fromCompany->building_name }}</p>
                    </td>
                    <td class="copy_success">
                        <p><button class="address_clipboard" data-clipboard-text="{!! $fromCompany->address !!}">コピー</button></p>
                        <p><button class="municipalities_and_number_clipboard" data-clipboard-text="{!! $fromCompany->municipalities_and_number !!}">コピー</button></p>
                        <p><button class="municipalities_clipboard" data-clipboard-text="{!! $fromCompany->municipalities !!}">コピー</button></p>
                        <p><button class="building_name_clipboard" data-clipboard-text="{!! $fromCompany->building_name !!}">コピー</button></p>
                    </td>
                </tr>

                <tr>
                    <th>電話番号</th>
                    <td class="telephone">{{ $fromCompany->telephone }}</td>
                    <td class="copy_success">
                        <button class="telephone_clipboard" data-clipboard-text="{!! $fromCompany->telephone !!}">コピー</button>
                    </td>
                </tr>

                <tr>
                    <th>ホームページURL</th>
                    <td class="short_character">{{ $fromCompany->homepage }}</td>
                    <td class="copy_success">
                        <button class="homepage_clipboard" data-clipboard-text="{!! $fromCompany->homepage !!}">コピー</button>
                    </td>
                </tr>


                <tr>
                    <th>email</th>
                    <td class="short_character">{{ $fromCompany->email }}</td>
                    <td class="copy_success">
                        <button class="email_clipboard" data-clipboard-text="{!! $fromCompany->email !!}">コピー</button>
                    </td>
                </tr>

                <tr>
                    <th>
                        <p>担当者-氏名（）</p>
                        <p>担当者-姓（）</p>
                        <p>担当者-名（）</p>
                    </th>
                    <td>
                        <p>{{ $fromCompany->person_in_charge }}</p>
                        <p>{{ $fromCompany->person_in_charge_sei }}</p>
                        <p>{{ $fromCompany->person_in_charge_mei }}</p>
                    </td>
                    <td class="copy_success">
                        <p><button class="person_in_charge_clipboard" data-clipboard-text="{!! $fromCompany->person_in_charge !!}">コピー</button></p>
                        <p><button class="person_in_charge_sei_clipboard" data-clipboard-text="{!! $fromCompany->person_in_charge_sei !!}">コピー</button></p>
                        <p><button class="person_in_charge_mei_clipboard" data-clipboard-text="{!! $fromCompany->person_in_charge_mei !!}">コピー</button></p>
                    </td>
                </tr>

                <tr>
                    <th>
                        <p>フリガナ-氏名（）</p>
                        <p>フリガナ-姓（）</p>
                        <p>フリガナ-名（）</p>
                    </th>
                    <td>
                        <p>{{ $fromCompany->kana_full }}</p>
                        <p>{{ $fromCompany->kana_sei }}</p>
                        <p>{{ $fromCompany->kana_mei }}</p>
                    </td>
                    <td class="copy_success">
                        <p><button class="kana_full_clipboard" data-clipboard-text="{!! $fromCompany->kana_full !!}">コピー</button></p>
                        <p><button class="kana_sei_clipboard" data-clipboard-text="{!! $fromCompany->kana_sei !!}">コピー</button></p>
                        <p><button class="kana_mei_clipboard" data-clipboard-text="{!! $fromCompany->kana_mei !!}">コピー</button></p>
                    </td>
                </tr>


                <tr>
                    <th>
                        <p>ふりがな-氏名（）</p>
                        <p>ふりがな-姓（）</p>
                        <p>ふりがな-名（）</p>
                    </th>
                    <td>
                        <p>{{ $fromCompany->furigana_hiragana }}</p>
                        <p>{{ $fromCompany->furigana_sei }}</p>
                        <p>{{ $fromCompany->furigana_mei }}</p>
                    </td>
                    <td class="copy_success">
                        <p><button class="furigana_hiragana_clipboard" data-clipboard-text="{!! $fromCompany->furigana_hiragana !!}">コピー</button></p>
                        <p><button class="furigana_sei_clipboard" data-clipboard-text="{!! $fromCompany->furigana_sei !!}">コピー</button></p>
                        <p><button class="furigana_mei_clipboard" data-clipboard-text="{!! $fromCompany->furigana_mei !!}">コピー</button></p>
                    </td>
                </tr>


                <tr>
                    <th>件名（）</th>
                    <td class="short_character">{{ $fromCompany->subject }}</td>
                    <td class="copy_success">
                        <button class="subject_clipboard" data-clipboard-text="{!! $fromCompany->subject !!}">コピー</button>
                    </td>
                </tr>


                <tr>
                    <th>営業文（）</th>
                    <td class="short_character">{!!  nl2br(e($fromCompany->sales_letter)) !!}</td>
                    {{-- <td id="sales_letter_set">{!!  nl2br(e($fromCompany->sales_letter)) !!}</td> --}}
                    {{-- <input id="sales_letter_set" type="hidden" value="{!!  nl2br(e($fromCompany->sales_letter)) !!}"> --}}

                    <td class="copy_success">
                        <button class="sales_letter_clipboard" data-clipboard-text="{!!  $fromCompany->sales_letter !!}">コピー</button>
                        <!-- <button class="btn sales_letter_set_btn" data-clipboard-text="#sales_letter">コピー</button> -->

                    </td>
                </tr>

                <tr>
                    <th>営業文-URLなし（）</th>
                    <!-- <td>!! nl2bre$fromCompany->sales_letter !!</td> -->
                    <td class="short_character">{!!  nl2br(e($fromCompany->sales_letter_url_none)) !!}</td>
                    {{-- <td id="sales_letter_set">{!!  nl2br(e($fromCompany->sales_letter_url_none)) !!}</td> --}}
                    {{-- <input id="sales_letter_set" type="hidden" value="{!!  nl2br(e($fromCompany->sales_letter_url_none)) !!}"> --}}

                    <td class="copy_success">
                        <button class="sales_letter_url_none_clipboard" data-clipboard-text="{!!  $fromCompany->sales_letter_url_none !!}">コピー</button>
                    </td>
                </tr>

                <tr>
                    <th>営業文-300文字（）</th>
                    <!-- <td>!! nl2bre$fromCompany->sales_letter !!</td> -->
                    <td class="short_character">{!!  nl2br(e($fromCompany->sales_letter_url_none)) !!}</td>
                    {{-- <td id="sales_letter_set">{!!  nl2br(e($fromCompany->sales_letter_url_none)) !!}</td> --}}
                    {{-- <input id="sales_letter_set" type="hidden" value="{!!  nl2br(e($fromCompany->sales_letter_300_words)) !!}"> --}}

                    <td class="copy_success">
                        <button class="sales_letter_300_words_clipboard" data-clipboard-text="{!!  $fromCompany->sales_letter_300_words !!}">コピー</button>
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
                     <iframe  id="to_comapny_page" style="width:130%;height:1300px;border-radius:5px;"></iframe>
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
