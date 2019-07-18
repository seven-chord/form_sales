<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->truncate();

        $categories = [
            1 => '営業系',
            2 => '企画・事務・マーケティング・管理系',
            3 => '販売・サービス系',
            4 => '専門サービス系',
            5 => '専門職系',
            6 => 'クリエイティブ系',
            7 => 'エンジニア系(IT・Web・ゲーム・通信)',
            8 => '技術系(電気、電子、機械)',
            9 => '技術系(建築、土木)',
            10 => '技術系(医薬、化学、素材、食品)',
            11 => '施設・設備管理、技能工、運輸・物流系',
            12 => '公務員、団体職員、その他',
        ];

        foreach($categories as $id => $category) {
            DB::table('categories')->insert([
                'id' => $id,
                'subcategory_ids' => '',
                'name' => $category,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        }
    }
}
