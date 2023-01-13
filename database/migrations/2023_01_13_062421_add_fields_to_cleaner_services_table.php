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
        Schema::table('cleaner_services', function (Blueprint $table) {
            //
            $table->integer('services_id')->nullable();
            $table->foreignId('services_items_id')->unsigned()->nullable()->change();

            $table->enum('is_recurring', ['0', '1'])->default('0');
            $table->enum('is_custom', ['0', '1'])->default('0');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cleaner_services', function (Blueprint $table) {
            //
            $table->dropColumn('services_id');
            $table->dropColumn('is_recurring');
            $table->dropColumn('is_custom');
        });
    }
};
