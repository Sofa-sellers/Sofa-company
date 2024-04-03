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
        Schema::create('zips', function (Blueprint $table) {
            $table->id();
            $table->string('city')->unique();
            $table->string('zip')->unique();
            $table->integer('ship_cost')->default(500000);
            $table->tinyInteger('status')->default(1)->comment('1 show - 2 hide');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('zips_name');
    }
};
