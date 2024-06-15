<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('articulos', function (Blueprint $table) {
            $table->integer('ambientes_idambiente');
            $table->integer('categorias_idcategoria');
            $table->integer('marcas_idmarca');
            $table->string('nroserie', 50);
            $table->string('articulo', 70);
            $table->date('fechaadq');
            $table->integer('estado');
            $table->timestamps();

            $table->foreign('ambientes_idambiente')->references('idambiente')->on('ambientes');
            $table->foreign('categorias_idcategoria')->references('idcategoria')->on('categorias');
            $table->foreign('marcas_idmarca')->references('idmarca')->on('marcas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
