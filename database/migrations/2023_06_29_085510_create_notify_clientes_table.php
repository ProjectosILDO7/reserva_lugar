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
        Schema::create('notify_clientes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cliente_id');
            $table->unsignedBigInteger('user_id');
            $table->string('conteudo');
            $table->string('status');
            $table->timestamps();
            $table->foreign('cliente_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('notify_clientes', function (Blueprint $table) {
            $table->dropForeign('notify_clientes_cliente_id_foreign');
            $table->dropColumn('reserva_id');
            $table->dropForeign('notify_clientes_user_id_foreign');
            $table->dropColumn('reserva_id');
        });
        Schema::dropIfExists('notify_clientes');
    }
};
