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
        Schema::create('discounts', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();

            $table->string('title');
            $table->text('discription')->nullable();
            $table->enum('status', ['0', '1'])->default('0');
            $table->string('min_sqft');
            $table->string('max_sqft')->nullable();

            $table->timestamps();
        });

        DB::table('discounts')->insert([
            'title' => 'Large Home Discount (2,001-3,500 Sq Ft)',
            'status' => '1',
            'min_sqft' => '2001',
            'max_sqft' => '3500',
        ]);

        DB::table('discounts')->insert([
            'title' => 'XL Home Discount (3,501 and up sq ft)',
            'status' => '1',
            'min_sqft' => '3501',
            'max_sqft' => null,
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('discounts');
    }
};
