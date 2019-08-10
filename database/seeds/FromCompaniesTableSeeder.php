<?php

use Illuminate\Database\Seeder;

class FromCompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('from_companies')->truncate();

        DB::table('from_companies')->insert([
            'id' => 1,
            'company_name' => '株式会社セブンコード',
            'postcode' => '104-0061',
            'address' => '東京都中央区銀座７丁目５−４ 毛利ビル5F',
            'telephone' => '03-1111-2222',
            'homepage' => 'https://www.syachi9.black/',
            'email' => 'info@7chord.com',
            'sales_letter' => 'インターネットで世界の有益な知恵を瞬時に結ぶ情報革命の世の中で、生活の常識が大きく変わってきました。\r\n\r\n日本人の三大義務の一つ、”勤労”も誰かに仕える常識から変化が生じています。これは確実に断言できます。\r\n\r\nこの情報革命の世の中で幸せになっている人々、成果をだしている人々は決まって、【仕事】を【志事】にしています。',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'person_in_charge' => '担当者A'
        ]);

        DB::table('from_companies')->insert([
            'id' => 2,
            'company_name' => '株式会社abc',
            'postcode' => '123-4567',
            'address' => '東京都中央区銀座７丁目５−４ 毛利ビル5F',
            'telephone' => '03-3333-2222',
            'homepage' => 'https://www.syachi9.black/',
            'email' => 'info@7chord.com',
            'sales_letter' => 'セールスレターテスト',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'person_in_charge' => '担当者B'
        ]);
    }
}
