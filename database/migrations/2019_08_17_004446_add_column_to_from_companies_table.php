<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnToFromCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('from_companies', function (Blueprint $table) {
            $table->string('company_name_kana');
            $table->string('division');
            $table->string('municipalities_and_number');
            $table->string('municipalities');
            $table->string('address_number');
            $table->string('building_name');
            $table->string('person_in_charge_sei');
            $table->string('person_in_charge_mei');
            $table->string('furigana_sei');
            $table->string('furigana_mei');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('from_companies', function (Blueprint $table) {
            //
        });
    }
}
