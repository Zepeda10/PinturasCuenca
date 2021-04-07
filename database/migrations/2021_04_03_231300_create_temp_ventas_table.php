<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTempVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temp_ventas', function (Blueprint $table) {
            $table->id();
            $table->string("folio");
            $table->string("codigo_barras",30);
            $table->string("producto");
            $table->integer("cantidad");
            $table->float("precio");
            $table->float("subtotal");

            $table->unsignedBigInteger('producto_id')->nullable(); //Creando llave foránea

            $table->foreign('producto_id') //Indicando llave foránea
                    ->references('id')->on('productos')
                    ->onDelete('set null');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('temp_ventas');
    }
}
