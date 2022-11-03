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
        Schema::create('user_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('states_id')->references('id')->on('states')->onDelete('cascade');
            $table->text('about')->nullable();
            $table->date('dob')->nullable();
            $table->string('ssn_or_tax')->nullable();
            $table->text('address');
            $table->string('apt_or_unit');
            $table->string('city', 100);
            $table->string('zip_code', 20);
            $table->enum('payment_method', ['Paypal','Direct Deposit']);
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
        Schema::dropIfExists('user_details');
    }
};
