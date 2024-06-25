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
        Schema::table('articulos', function (Blueprint $table) {
            $table->dropColumn('estado');
            $table->integer('Stock_en_uso')->default(0);
            $table->integer('Stock_almacenado')->default(0);
            $table->integer('stock_dañado')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('articulos', function (Blueprint $table) {
            $table->dropColumn('Stock_en_uso');
            $table->dropColumn('Stock_almacenado');
            $table->dropColumn('stock_dañado');
        });
    }
};
