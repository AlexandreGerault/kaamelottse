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
			$table->string('title');
			$table->string('subtitle')->nullable();
			$table->string('image')->nullable();
			$table->text('content')->nullable();
			$table->integer('priority')->default(0);
			$table->boolean('visible')->default(0);
			$table->string('slug')->nullable();
			$table->string('link')->nullable();
			$table->unsignedBigInteger('author_id');
			
			$table->softDeletes();
            $table->timestamps();
        });

        Schema::table('articles', function (Blueprint $table) {
            $table->foreign('author_id')->references('id')->on('users');
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
