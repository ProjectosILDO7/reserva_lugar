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
        Schema::create('total_presencas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('assinatura_id');
            $table->string('mes');
            $table->string('ano');
            $table->string('total');
            $table->timestamps();

            $table->foreign('assinatura_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('total_presencas', function (Blueprint $table) {
            $table->dropForeign('total_presencas_assinatura_id_foreign');
            $table->dropColumn('assinatura_id');
        });
        Schema::dropIfExists('total_presencas');
    }
};
