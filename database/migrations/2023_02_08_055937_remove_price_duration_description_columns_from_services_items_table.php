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
        Schema::table('services_items', function (Blueprint $table) {
            $table->dropColumn('price');
            $table->dropColumn('duration');
            $table->dropColumn('description');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('services_items', function (Blueprint $table) {
            $table->string('price')->nullable();
            $table->string('duration')->nullable();
            $table->string('description')->nullable();
        });
    }
};
