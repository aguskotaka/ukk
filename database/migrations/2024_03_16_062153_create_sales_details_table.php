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
        Schema::create('sales_details', function (Blueprint $table) {
            $table->id();
            $table->string('sale_code');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('total_product');
            $table->unsignedBigInteger('sub_total');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('sale_code')->references('sale_code')->on('sales')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales__details');
    }
};
