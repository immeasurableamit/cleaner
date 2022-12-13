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
        Schema::create('bank_infos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('users_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('account_id', 30);
            $table->string('status', 30);
	    $table->boolean('payouts_enabled')->default(false);
	    $table->boolean('charges_enabled')->default(false);
            $table->string('account_holder_name', 50)->nullable();
            $table->string('account_number', 20)->nullable();
            $table->bigInteger('routing_number')->nullable();
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
        Schema::dropIfExists('bank_infos');
    }
};
