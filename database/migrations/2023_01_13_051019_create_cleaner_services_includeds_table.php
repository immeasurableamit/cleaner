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
        Schema::create('cleaner_services_includeds', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();

            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('services_id')->references('id')->on('services')->onDelete('cascade');
            $table->text('data');

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
        Schema::dropIfExists('cleaner_services_includeds');
    }
};
