<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_ventas', function (Blueprint $table) {        
            $table->id();
            $table->string("nombre");
            $table->integer("cantidad");
            $table->float("precio_individual");

            $table->unsignedBigInteger('venta_id')->nullable(); //Creando llave foránea
            $table->unsignedBigInteger('producto_id')->nullable(); //Creando llave foránea

            $table->foreign('venta_id') //Indicando llave foránea
                    ->references('id')->on('ventas')
                    ->onDelete('cascade');

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
        Schema::dropIfExists('detalle_ventas');
    }
}
