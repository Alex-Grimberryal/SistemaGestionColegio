<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('citas', function (Blueprint $table) {
            $table->dropColumn('fechahora');
            $table->decimal('horarioI', 4, 2);
            $table->decimal('horarioF', 4, 2);
        });
    }

    public function down()
    {
        Schema::table('citas', function (Blueprint $table) {
            $table->dateTime('fechahora');
            $table->dropColumn(['horarioI', 'horarioF']);
        });
    }
};
