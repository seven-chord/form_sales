<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ToCompany extends Model
{
    public $timestamps = false;

    //to_companiesテーブル
    protected $table = 'to_companies';

    //必須の要素を記述する（企業名、都道府県、住所、カテゴリー、問い合わせフォームURL）
    protected $fillable = ['id', 'company_name','address_1','address_2','categories','contact_url'];
}
