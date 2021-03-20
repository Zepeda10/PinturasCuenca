<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UsersClaves extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('role_id')->nullable(); //Creando llave foránea
            $table->unsignedBigInteger('imagen_id')->nullable(); //Creando llave foránea

            $table->foreign('role_id') //Indicando llave foránea
                    ->references('id')->on('roles')
                    ->onDelete('set null');

            $table->foreign('imagen_id') //Indicando llave foránea
                    ->references('id')->on('imagenes')
                    ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['role_id', 'imagen_id', ]);
        });
    }
}
