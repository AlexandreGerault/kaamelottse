<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('author_id')->nullable();
			$table->unsignedBigInteger('category');
            $table->string('email');
            $table->string('subject');
            $table->string('sender_ip');
			$table->boolean('responded')->default(0);
			$table->text('content');
            $table->timestamps();
        });

        Schema::table('messages', function (Blueprint $table) {
            $table->foreign('author_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('messages', function (Blueprint $table) {
            $table->dropForeign('messages_author_id_foreign');
        });
        Schema::dropIfExists('messages');
    }
}
