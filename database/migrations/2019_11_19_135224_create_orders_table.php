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
            $table->unsignedBigInteger('customer_id');
            $table->integer('status')->default(0);
            $table->float('total_price');
            $table->string('shipping_address');
            $table->integer('total_points');
            $table->string('phone');
            $table->integer('delivery_rating');
            $table->unsignedBigInteger('delivery_driver_id');
            $table->dateTime('paid_at')->nullable()->default(null);
            $table->dateTime('shipped_at')->nullable()->default(null);
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
        Schema::dropIfExists('orders');
    }
}
