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
                'address_1' => '東京都新宿区',
                'address_2' => '歌舞伎町1-1-1',
                'telephone_1' => '010-0000-0000',
                'categories' => 'aaa,bbb,ccc',
                'contact_url' => 'https://google.co.jp',
                'possible_send_flag' => '1',
                'is_active' => true,
            ],
            [
                'company_name' => 'testcompany2',
                'address_1' => '東京都新宿区',
                'address_2' => '歌舞伎町1-1-2',
                'telephone_1' => '020-0000-0000',
                'categories' => 'aaa,bbb,ccc',
                'contact_url' => 'https://google.co.jp',
                'possible_send_flag' => '1',
                'is_active' => true,
            ],
            [
                'company_name' => 'testcompany3',
                'address_1' => '東京都新宿区',
                'address_2' => '歌舞伎町1-1-3',
                'telephone_1' => '030-0000-0000',
                'categories' => 'aaa,bbb,ccc',
                'contact_url' => 'https://google.co.jp',
                'possible_send_flag' => '1',
                'is_active' => true,
            ],

        ];

        foreach($to_companies as $to_company) {
            DB::table('to_companies')->insert([
                'company_name' => $to_company['company_name'],
                'address_1' => $to_company['address_1'],
                'address_2' => $to_company['address_2'],
                'telephone_1' => $to_company['telephone_1'],
                'categories' => $to_company['categories'],
                'contact_url' => $to_company['contact_url'],
                'possible_send_flag' => $to_company['possible_send_flag'],
            ]);
        }

    }
}
