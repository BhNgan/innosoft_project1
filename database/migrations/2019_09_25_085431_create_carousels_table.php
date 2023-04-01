<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarouselsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carousels', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('sort')->nullable()->default(0);
            $table->string('avatar', 191)->nullable()->default('');
            $table->string('text_overlay', 191)->nullable()->default('');
            $table->string('url', 191)->nullable()->default('');
            $table->string('carousel_name', 191)->nullable()->default('');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carousels');
    }
}
