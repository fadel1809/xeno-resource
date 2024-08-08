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
            $table->string('user_id');
            $table->string('username');
            $table->unsignedBigInteger('total_food')->default(0);
            $table->unsignedBigInteger('total_wood')->default(0);
            $table->unsignedBigInteger('total_steel')->default(0);
            $table->unsignedBigInteger('total_oil')->default(0);
            $table->string('order_date');
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
