<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->text('avatar')->nullable()->comment('Ảnh đại diện');
            $table->string('product_name')->comment('Loại sản phẩm');
            $table->decimal('receipt_price', 10, 0)->default(0)->comment('Giá nhập');
            $table->decimal('bill_price', 10, 0)->default(0)->comment('Giá bán');
            $table->unsignedBigInteger('stock')->default(0)->comment('Tồn kho');
            $table->boolean('is_show')->default(1)->comment('Hiển thị');
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
        Schema::dropIfExists('products');
    }
}
