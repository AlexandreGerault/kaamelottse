<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->string('titre');
			$table->string('sous_titre')->nullable();
			$table->string('image')->nullable();
			$table->text('contenu')->nullable();
			$table->integer('priorite')->default(0);
			$table->boolean('visible')->default(0);
			$table->integer('user_creator');
			
			$table->softDeletes();
            $table->timestamps();
			$table->foreign('user_creator')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
