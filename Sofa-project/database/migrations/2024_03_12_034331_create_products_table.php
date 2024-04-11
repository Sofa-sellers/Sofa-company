<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image');
            $table->string('slug');
            $table->unsignedBigInteger('brand_id');
            $table->foreign('brand_id')->references('id')->on('brands');
            $table->string('intro');
            $table->text('description');
            $table->double('price')->nullable();
            $table->double('sale_price')->default(100);
            $table->unsignedBigInteger('dimension_id');
            $table->foreign('dimension_id')->references('id')->on('attribute_values');
            $table->unsignedBigInteger('material_id');
            $table->foreign('material_id')->references('id')->on('attribute_values');
            $table->integer('quantity');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->tinyInteger('featured')->default(2)->comment('1 featured - 2 unfeatured');
            $table->tinyInteger('is_sale')->default(2)->comment('1 sale - 2 not sale');
            $table->tinyInteger('status')->default(1)->comment('1 Show - 2 Hide');
            $table->string('file');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
