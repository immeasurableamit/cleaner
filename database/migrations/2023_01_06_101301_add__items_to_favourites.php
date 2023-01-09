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
        Schema::table('favourites', function (Blueprint $table) {
            $table->string('cleaning_type')->nullable();
            $table->string('home_size')->nullable();
            $table->time('estimated_time')->nullable();
            $table->string('price')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('favourites', function (Blueprint $table) {

            $table->dropColumn('cleaning_type');
            $table->dropColumn('home_size');
            $table->dropColumn('estimated_time');
            $table->dropColumn('price');
        });
    }
};
