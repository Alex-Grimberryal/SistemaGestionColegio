<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPrimaryKeyToArticulosTable extends Migration
{
    public function up(): void
    {
        Schema::table('articulos', function (Blueprint $table) {
            $table->id('id')->first();
        });
    }

    public function down(): void
    {

    }
}
