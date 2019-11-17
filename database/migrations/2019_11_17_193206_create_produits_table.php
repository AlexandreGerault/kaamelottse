<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produits', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->string('nom');
			$table->text('description')->nullable();
			$table->string('image')->nullable();
			$table->integer('priorite')->default(0);
			$table->integer('stock')->default(0);
			$table->integer('prix')->default(0);
			$table->integer('points')->default(0);
			$table->boolean('visible')->default(0);
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
        Schema::dropIfExists('produits');
    }
}
