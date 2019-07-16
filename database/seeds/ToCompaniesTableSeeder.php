<?php

use Illuminate\Database\Seeder;

class ToCompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('to_companies')->truncate();

        $to_companies = [
            [
                'company_name' => 'testcompany1',
                'prefecture_id' => 1, // 北海道
                'category_id' => 1, // 営業系
                'address_1' => '北海道',
                'address_2' => '歌舞伎町1-1-1',
                'telephone_1' => '010-0000-0000',
                'contact_url' => 'https://google.co.jp',
                'possible_send_flag' => '1',
                'is_active' => true,
            ],
            [
                'company_name' => 'testcompany2',
                'prefecture_id' => 13, // 東京
                'category_id' => 2, // 企画・事務・マーケティング・管理系
                'address_1' => '東京都練馬区',
                'address_2' => '歌舞伎町1-1-2',
                'telephone_1' => '020-0000-0000',
                'contact_url' => 'https://google.co.jp',
                'possible_send_flag' => '1',
                'is_active' => true,
            ],
            [
                'company_name' => 'testcompany3',
                'prefecture_id' => 13, // 東京
                'category_id' => 3, // 販売・サービス系
                'address_1' => '東京都品川区',
                'address_2' => '歌舞伎町1-1-3',
                'telephone_1' => '030-0000-0000',
                'contact_url' => 'https://google.co.jp',
                'possible_send_flag' => '1',
                'is_active' => true,
            ],
            [
                'company_name' => 'testcompany4',
                'prefecture_id' => 13, // 東京
                'category_id' => 3, // 販売・サービス系
                'address_1' => '東京都新宿区',
                'address_2' => '歌舞伎町1-1-3',
                'telephone_1' => '030-0000-0000',
                'contact_url' => 'https://google.co.jp',
                'possible_send_flag' => '1',
                'is_active' => true,
            ],
            [
                'company_name' => 'testcompany5',
                'prefecture_id' => 12, // 千葉
                'category_id' => 4, // 専門サービス系'
                'address_1' => '千葉県千葉市',
                'address_2' => '歌舞伎町1-1-3',
                'telephone_1' => '030-0000-0000',
                'contact_url' => 'https://google.co.jp',
                'possible_send_flag' => '1',
                'is_active' => true,
            ],

        ];

        foreach($to_companies as $to_company) {
            DB::table('to_companies')->insert([
                'company_name' => $to_company['company_name'],
                'prefecture_id' => $to_company['prefecture_id'],
                'category_id' => $to_company['category_id'],
                'address_1' => $to_company['address_1'],
                'address_2' => $to_company['address_2'],
                'telephone_1' => $to_company['telephone_1'],
                'contact_url' => $to_company['contact_url'],
                'possible_send_flag' => $to_company['possible_send_flag'],
            ]);
        }

    }
}
