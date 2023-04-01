<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUrlTargetSortIsShowToSponsorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sponsors', function (Blueprint $table) {
            $table->string('url', 191)->after('avatar')->nullable()->default('');
            $table->string('target', 191)->after('avatar')->nullable()->default('');
            $table->integer('sort')->after('avatar')->unsigned()->nullable()->default(0);
            $table->boolean('is_show')->after('avatar')->nullable()->default(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sponsors', function (Blueprint $table) {
            $table->dropColumn(['url', 'target', 'sort', 'is_show']);
        });
    }
}
