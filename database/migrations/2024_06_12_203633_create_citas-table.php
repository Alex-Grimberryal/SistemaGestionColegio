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
        Schema::create('citas', function (Blueprint $table) {
            $table->integer('ambientes_idambiente');
            $table->integer('profesores_idprofesor');
            $table->date('fechahora');
            $table->timestamps();

            $table->foreign('ambientes_idambiente')->references('idambiente')->on('ambientes');
            $table->foreign('profesores_idprofesor')->references('idprofesor')->on('profesores');
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
