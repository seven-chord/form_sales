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
            $table->string('company_name_kana')->nullable();
            $table->string('division')->nullable();
            $table->string('municipalities_and_number')->nullable();
            $table->string('municipalities')->nullable();
            $table->string('address_number')->nullable();
            $table->string('building_name')->nullable();
            $table->string('person_in_charge_sei')->nullable();
            $table->string('person_in_charge_mei')->nullable();
            $table->string('furigana_sei')->nullable();
            $table->string('furigana_mei')->nullable();
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
