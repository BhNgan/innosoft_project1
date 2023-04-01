<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            // $table->string('customer_name')->comment('Khách hàng');
            // $table->string('company')->nullable()->comment('Đơn vị');
            $table->string('first_name')->comment('Họ');
            $table->string('last_name')->comment('Tên');
            $table->string('phone')->comment('Điện thoại');
            $table->string('address')->nullable()->comment('Địa chỉ');
            $table->string('email')->nullable()->comment('Email');
            $table->string('content')->nullable()->comment('Ghi chú');
            // $table->decimal('total', 10, 2)->default(0)->comment('Tổng cộng');

            // $table->unsignedBigInteger('city_id');
            // $table->unsignedBigInteger('district_id');
            // $table->unsignedBigInteger('ward_id')->nullable();
            
            $table->timestamps();
            // $table->foreign('city_id')->references('id')->on('cities')->onDelete('restrict');
            // $table->foreign('district_id')->references('id')->on('districts')->onDelete('restrict');
            // $table->foreign('ward_id')->references('id')->on('wards')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
