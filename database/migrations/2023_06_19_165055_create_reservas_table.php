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
        Schema::create('reservas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('transporte_id');
            $table->string('data');
            $table->string('status')->default(1);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('transporte_id')->references('id')->on('transportes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('reservas', function (Blueprint $table) {
            $table->dropForeign('reservas_user_id_foreign');
            $table->dropColumn('user_id');

            $table->dropForeign('reservas_transporte_id_foreign');
            $table->dropColumn('transporte_id');
        });
        Schema::dropIfExists('reservas');
    }
};
