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
        Schema::create('skus', function (Blueprint $table) {
            $table->id();
            // $table->string('code');
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products');
            $table->unsignedBigInteger('attribute_id')->default(1);
            $table->foreign('attribute_id')->references('id')->on('attributes');
            $table->unsignedBigInteger('value_id');
            $table->foreign('value_id')->references('id')->on('attribute_values');
            $table->tinyInteger('status')->default(1)->comment('1 Show - 2 Hide');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skus');
    }
};
