<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
			$table->string('name');
			$table->text('description')->nullable();
			$table->string('image')->nullable();
			$table->integer('priority')->default(0);
			$table->integer('stock')->default(0);
			$table->float('price')->default(0);
			$table->integer('points')->default(0);
			$table->boolean('available')->default(false);
			$table->softDeletes();
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
        Schema::dropIfExists('products');
    }
}
