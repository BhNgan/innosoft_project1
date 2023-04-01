<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContentCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('content_categories', function (Blueprint $table) {
            $table->unsignedBigInteger('content_id');
            $table->unsignedBigInteger('category_id');
            
            $table->boolean('is_used')->default(0);
            $table->boolean('is_show')->default(1);
            $table->boolean('is_featured')->default(0);
            $table->integer('sort')->default(0);

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('content_id')->references('id')->on('contents')->onDelete('restrict');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('restrict');

            $table->primary(['content_id', 'category_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('content_categories');
    }
}
