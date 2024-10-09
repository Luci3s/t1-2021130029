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
        Schema::create('shops', function (Blueprint $table) {
            $table->char('id', 12)->primary();
            $table->timestamp('created_at',)->nullable();
            $table->timestamp('updated_at', 0)->nullable();
            $table->string('product_name');
            $table->text('description');
            $table->double('retail_price',8,2)->default(0.0);
            $table->double('wholesale_price', 8, 2)->default(0.0);
            $table->char('origin', 2);
            $table->unsignedInteger('quantity')->default(0);
            $table->text('product_img')->nullable(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shops');
    }
};
