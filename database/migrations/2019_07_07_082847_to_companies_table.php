<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ToCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('to_companies', function (Blueprint $table) {
                $table->increments('id');
                $table->string('company_name');
                $table->unsignedInteger('prefecture_id');
                $table->unsignedInteger('category_id');
                $table->string('address_1');
                $table->string('address_2');
                $table->string('telephone_1');
                $table->string('contact_url');
                $table->integer('possible_send_flag'); //1=可能,2=不可,0=まだ
        });

        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
