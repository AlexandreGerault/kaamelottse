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
            $table->unsignedBigInteger('customer_id')->nullable()->default(null);
            $table->integer('status')->default(0);
            $table->float('total_price')->nullable()->default(null);
            $table->string('shipping_address')->nullable()->default(null);
            $table->string('method_payment')->nullable()->default(null);
            $table->integer('total_points')->nullable()->default(null);
            $table->string('phone')->nullable()->default(null);
            $table->integer('delivery_rating')->nullable()->default(null);
            $table->unsignedBigInteger('delivery_driver_id')->nullable()->default(null);
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
