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
        Schema::table('orders', function (Blueprint $table) {
            $table->decimal('discount', 18, 2 )->default(0);
			$table->foreignId('cleaner_discount_id')->nullable();
			$table->integer('discount_percentage')->nullable();
			$table->string('discount_title')->nullable();
			
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
//            $table->dropColumn('discount');
			$table->dropColumn([
				'discount',
				'cleaner_discount_id',
				'discount_percentage',
				'discount_title'
			]);
        });
    }
};
