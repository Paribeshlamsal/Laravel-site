<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->enum('membership_type', ['basic', 'vip', 'premium']); // Change the membership types to basic, vip, premium
            $table->date('membership_start_date')->nullable();  // Allow null value
            $table->date('membership_end_date')->nullable();    // Allow null value
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('members');
    }
}
