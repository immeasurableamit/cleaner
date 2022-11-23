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
        Schema::create('types', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();

            $table->string('title');

            $table->timestamps();
        });


        DB::table('types')->insert([
            'title' => 'Full Home Cleanings'
        ]);

        DB::table('types')->insert([
            'title' => 'Home Add-Ons'
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('types');
    }
};
