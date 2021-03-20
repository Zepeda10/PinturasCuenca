<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('cod_barras',30)->unique();
            $table->text('descripcion');
            $table->integer('stock');
            $table->float('precio_compra');
            $table->float('precio_venta');
            $table->float('iva');

            $table->unsignedBigInteger('categoria_id')->nullable(); //Creando llave foránea
            $table->unsignedBigInteger('proveedor_id')->nullable(); //Creando llave foránea
            $table->unsignedBigInteger('imagen_id')->nullable(); //Creando llave foránea

            $table->foreign('categoria_id') //Indicando llave foránea
                    ->references('id')->on('categorias')
                    ->onDelete('set null');

            $table->foreign('proveedor_id') //Indicando llave foránea
                    ->references('id')->on('proveedores')
                    ->onDelete('set null');

            $table->foreign('imagen_id') //Indicando llave foránea
                    ->references('id')->on('imagenes')
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
        Schema::dropIfExists('productos');
    }
}
