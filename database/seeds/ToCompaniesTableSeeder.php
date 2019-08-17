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
                'contact_url' => 'https://bondassociates.co.jp/inquiryform',
                'possible_send_flag' => '1',
                'send_date' => date('Y-m-d H:i:s'),
                'from_company_id' => 1,
            ],
            [
                'company_name' => 'testcompany2',
                'address_1' => '東京都新宿区',
                'address_2' => '歌舞伎町1-1-2',
                'telephone_1' => '020-0000-0000',
                'categories' => 'aaa,bbb,ccc',
                'contact_url' => 'https://www.jmec.co.jp/contact/02.html',
                'possible_send_flag' => '1',
                'send_date' => date('Y-m-d H:i:s'),
                'from_company_id' => 1,
            ],
            [
                'company_name' => 'testcompany3',
                'address_1' => '東京都新宿区',
                'address_2' => '歌舞伎町1-1-3',
                'telephone_1' => '030-0000-0000',
                'categories' => 'aaa,bbb,ccc',
                'contact_url' => 'https://www.nisso.co.jp/contacts/client/',
                'possible_send_flag' => '1',
                'send_date' => date('Y-m-d H:i:s'),
                'from_company_id' => 2,
            ],
            [
                'company_name' => 'testcompany4',
                'address_1' => '東京都新宿区',
                'address_2' => '歌舞伎町1-1-4',
                'telephone_1' => '040-0000-0000',
                'categories' => 'aaa,bbb,ccc',
                'contact_url' => 'https://bondassociates.co.jp/inquiryform',
                'possible_send_flag' => '1',
                'send_date' => date('Y-m-d H:i:s'),
                'from_company_id' => 2,
            ],
            [
                'company_name' => 'testcompany5',
                'address_1' => '東京都新宿区',
                'address_2' => '歌舞伎町1-1-5',
                'telephone_1' => '050-0000-0000',
                'categories' => 'aaa,bbb,ccc',
                'contact_url' => 'https://www.jmec.co.jp/contact/02.html',
                'possible_send_flag' => '1',
                'send_date' => date('Y-m-d H:i:s'),
                'from_company_id' => 1,
            ],
            [
                'company_name' => 'testcompany6',
                'address_1' => '東京都新宿区',
                'address_2' => '歌舞伎町1-1-6',
                'telephone_1' => '060-0000-0000',
                'categories' => 'aaa,bbb,ccc',
                'contact_url' => 'https://www.nisso.co.jp/contacts/client/',
                'possible_send_flag' => '1',
                'send_date' => date('Y-m-d H:i:s'),
                'from_company_id' => 1,
            ],
            [
                'company_name' => 'testcompany7',
                'address_1' => '東京都新宿区',
                'address_2' => '歌舞伎町1-1-7',
                'telephone_1' => '070-0000-0000',
                'categories' => 'aaa,bbb,ccc',
                'contact_url' => 'https://bondassociates.co.jp/inquiryform',
                'possible_send_flag' => '1',
                'send_date' => date('Y-m-d H:i:s'),
                'from_company_id' => 1,
            ],
            [
                'company_name' => 'testcompany8',
                'address_1' => '東京都新宿区',
                'address_2' => '歌舞伎町1-1-8',
                'telephone_1' => '080-0000-0000',
                'categories' => 'aaa,bbb,ccc',
                'contact_url' => 'https://www.jmec.co.jp/contact/02.html',
                'possible_send_flag' => '1',
                'send_date' => date('Y-m-d H:i:s'),
                'from_company_id' => 2,
            ],
            [
                'company_name' => 'testcompany9',
                'address_1' => '東京都新宿区',
                'address_2' => '歌舞伎町1-1-9',
                'telephone_1' => '090-0000-0000',
                'categories' => 'aaa,bbb,ccc',
                'contact_url' => 'https://www.nisso.co.jp/contacts/client/',
                'possible_send_flag' => '1',
                'send_date' => date('Y-m-d H:i:s'),
                'from_company_id' => 1,
            ],
            [
                'company_name' => 'testcompany10',
                'address_1' => '東京都新宿区',
                'address_2' => '歌舞伎町1-1-10',
                'telephone_1' => '010-0000-0000',
                'categories' => 'aaa,bbb,ccc',
                'contact_url' => 'https://bondassociates.co.jp/inquiryform',
                'possible_send_flag' => '1',
                'send_date' => date('Y-m-d H:i:s'),
                'from_company_id' => 2,
            ],
            [
                'company_name' => 'testcompany11',
                'address_1' => '東京都新宿区',
                'address_2' => '歌舞伎町1-1-11',
                'telephone_1' => '011-0000-0000',
                'categories' => 'aaa,bbb,ccc',
                'contact_url' => 'https://www.jmec.co.jp/contact/02.html',
                'possible_send_flag' => '1',
                'send_date' => date('Y-m-d H:i:s'),
                'from_company_id' => 2,
            ],
            [
                'company_name' => 'testcompany12',
                'address_1' => '東京都新宿区',
                'address_2' => '歌舞伎町1-1-12',
                'telephone_1' => '012-0000-0000',
                'categories' => 'aaa,bbb,ccc',
                'contact_url' => 'https://www.nisso.co.jp/contacts/client/',
                'possible_send_flag' => '1',
                'send_date' => date('Y-m-d H:i:s'),
                'from_company_id' => 2,
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
                'from_company_id' => $to_company['from_company_id'],
            ]);
        }

    }
}
