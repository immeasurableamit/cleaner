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
            $table->boolean('is_custom')->default(0);
            $table->foreignId('cleaner_id')->nullable()->constrained('users');
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
            $table->dropColumn('is_custom');
            $table->dropColumn('cleaner_id');
        });
    }
};
