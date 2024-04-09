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
            $table->string('firstname');
            $table->string('lastname');
            $table->string('address');
            
            $table->string('city');
            $table->string('phone');
            $table->double('total_order');
            $table->tinyInteger('status')->default(1)->comment('1 waiting - 2 accepted - 3 deny - 4 Preparing shipment - 5 Handed over to the carrier - 6 In transit - 7 Delivered	');
            $table->string('reason')->nullable()->comment('Reason for order cancel');
            $table->text('note')->nullable();
            $table->softDeletes();
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
