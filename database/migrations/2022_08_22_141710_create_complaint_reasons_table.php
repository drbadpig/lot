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
        Schema::create('complaint_reasons', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->timestamps();
        });

        Schema::table('complaints', function (Blueprint $table) {
            $table->unsignedBigInteger('reason_id')->after('sender_user_id');
            $table->foreign('reason_id')->references('id')->on('complaint_reasons')->onDelete('cascade');
            $table->text('details')->nullable()->after('reason_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('complaints', function (Blueprint $table) {
            $table->dropForeign('complaints_reason_id_foreign');
            $table->dropColumn('reason_id');
            $table->dropColumn('details');
        });
        Schema::dropIfExists('complaint_reasons');
    }
};
