<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();  // This is the primary key column
            $table->unsignedBigInteger('user_id'); // Add the user_id column
            $table->decimal('amount', 10, 2);  // The amount column for payments
            $table->date('payment_date');  // Date when payment was made
            $table->string('payment_status');  // Status of the payment (paid, pending, etc.)
            $table->timestamps();  // created_at and updated_at columns

            // Foreign key constraint to link payment with a user
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }


    public function down()
    {
        Schema::dropIfExists('payments');
    }
}