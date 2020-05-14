<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserIdToFromCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('from_companies', function (Blueprint $table) {
            $sql = '
ALTER TABLE `from_companies`
ADD `user_id` BIGINT UNSIGNED NULL AFTER `project_name`,
ADD INDEX `idx_from_companies_02` (`user_id`);';

            DB::connection()->getPdo()->exec($sql);
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
            $sql = '
ALTER TABLE `from_companies`
DROP `user_id`';

            DB::connection()->getPdo()->exec($sql);
        });
    }
}
