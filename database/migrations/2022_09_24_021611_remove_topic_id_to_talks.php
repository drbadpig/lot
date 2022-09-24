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
        Schema::table('talks', function (Blueprint $table) {
            $table->dropForeign('talks_topic_id_foreign');
            $table->dropColumn('topic_id');

            $table->unsignedBigInteger('category_id')->after('user_id')->default(1);
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('talks', function (Blueprint $table) {
            $table->dropForeign('talks_category_id_foreign');
            $table->dropColumn('category_id');

            $table->unsignedBigInteger('topic_id')->after('user_id')->nullable();
            $table->foreign('topic_id')->references('id')->on('topics')->onDelete('cascade');
        });
    }
};
