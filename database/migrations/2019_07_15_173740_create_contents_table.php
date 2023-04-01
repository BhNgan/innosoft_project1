<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('content_id');
            $table->unsignedBigInteger('user_id');

            $table->text('avatar')->nullable();
            $table->string('title');
            $table->string('alias');
            $table->text('summary')->nullable();
            $table->longText('content');
            $table->boolean('is_show')->default(1);
            $table->boolean('is_draft')->default(0);
            $table->boolean('is_featured')->default(0);
            $table->integer('sort')->default(0);
            $table->string('tags')->nullable();
            $table->text('description')->nullable();
            $table->string('lang');
            $table->unsignedBigInteger('views')->default(0);
            $table->text('note')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contents');
    }
}
