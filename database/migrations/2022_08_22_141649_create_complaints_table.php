<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complaints', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sender_user_id');
            $table->foreign('sender_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('talk_id')->nullable();
            $table->foreign('talk_id')->references('id')->on('talks')->onDelete('cascade');
            $table->unsignedBigInteger('comment_id')->nullable();
            $table->foreign('comment_id')->references('id')->on('comments')->onDelete('cascade');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('complaints');
    }
};
