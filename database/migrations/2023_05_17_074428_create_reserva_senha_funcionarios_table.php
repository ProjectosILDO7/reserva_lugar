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
        Schema::create('reserva_senha_funcionarios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('organization_id');
            $table->string('senha_reserva');
            $table->timestamps();

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
        Schema::create('reserva_senha_estudantes', function (Blueprint $table) {
            $table->dropForeign('reserva_senha_estudantes_user_id_foreign');
            $table->dropForeign('reserva_senha_estudantes_organization_id_foreign');
            $table->dropColumn('user_id');
            $table->dropColumn('organization_id');
        });
        Schema::dropIfExists('reserva_senha_funcionarios');
    }
};
