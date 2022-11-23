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
        Schema::create('cleaner_services', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();

            $table->foreignId('users_id')->references('id')->on('users')->onDelete('cascade')->nullable();
            $table->foreignId('services_items_id')->references('id')->on('services_items')->onDelete('cascade')->nullable();

            $table->string('title')->nullable();
            $table->string('price')->nullable();
            $table->string('duration')->nullable();
            $table->string('description')->nullable();
            $table->enum('status', ['0', '1'])->default('0');

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
        Schema::dropIfExists('cleaner_services');
    }
};
