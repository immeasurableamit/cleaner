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
        Schema::create('orders', function (Blueprint $table) {

            $table->id();

            /* Details */
            $table->foreignId('user_id')->constrained()->restrictOnDelete();
            $table->foreignId('cleaner_id')->constrained('users')->restrictOnDelete();

            $table->string('status')->default('pending');
            $table->string('home_size_sq_ft');            
            $table->dateTime('cleaning_datetime');
            $table->integer('estimated_duration_hours');
            $table->boolean('is_paid');
            $table->text('notes')->nullable();
            

            /* Billing address */

            $table->string('first_name');
            $table->string('last_name');
            $table->string('address');
            $table->string('apt_or_unit');
            $table->string('city');
            $table->foreignId('state_id')->constrained()->restrictOnDelete();;
            $table->string('zip');

            /* Monetary details */
            $table->decimal('subtotal', 18, 2 );
            $table->decimal('tax', 18, 2 );
            $table->decimal('transaction_fees', 18, 2 );
            $table->decimal('total', 18, 2 );
            $table->string('payment_method');

            /* Paymnent Details */
        
            $table->boolean('is_paid_by_user')->default(0);
            $table->boolean('is_paid_out_to_cleaner')->default(0);
            $table->string('user_transaction_id')->nullable();
            $table->string('cleaner_transaction_id')->nullable();
            $table->boolean('is_refunded')->default(0);
            $table->string('refund_transaction_id')->nullable();
            
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
        Schema::dropIfExists('orders');
    }
};
