<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('types', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->text('avatar')->nullable()->comment('Ảnh đại diện');
            $table->string('type_name')->comment('Loại sản phẩm');
            $table->boolean('is_show')->default(1)->comment('Hiển thị');
            $table->integer('sort')->default(0)->comment('Sắp xếp');
            $table->text('note')->nullable()->comment('Ghi chú');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('types');
    }
}
