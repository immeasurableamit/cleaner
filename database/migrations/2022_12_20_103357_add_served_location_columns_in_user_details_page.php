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
        Schema::table('user_details', function (Blueprint $table) {
            $table->string('serve_radius_in_meters')->nullable();
            $table->string('serve_center_lat')->nullable();
            $table->string('serve_center_lng')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_details', function (Blueprint $table) {
            $table->dropColumn([
                'serve_radius_in_meters',
                'serve_center_lat',
                'serve_center_lng'
            ]);

        });
    }
};
