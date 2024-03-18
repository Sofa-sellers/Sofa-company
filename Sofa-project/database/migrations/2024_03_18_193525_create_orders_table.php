<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('email');
            $table->string('firstName');
            $table->string('lastName');
            $table->string('houseNumber');
            $table->string('apartmentNumber')->nullable();
            $table->string('companyName')->nullable();
            $table->string('ward');
            $table->string('district');
            $table->string('city');
            $table->string('postcode');
            $table->string('phone');
            $table->double('total_order');
            $table->double('status');
            $table->double('shippingFee');
            $table->double('discount_code')->nullable();
            $table->double('note')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
