<?php

use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Carbon as SupportCarbon;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
         Schema::create('order_details', function (Blueprint $table) {
            $table->id(); 
            $table->string('order_id');
            $table->string('user_id');
            $table->unsignedBigInteger('food')->default(0);
            $table->unsignedBigInteger('wood')->default(0);
            $table->unsignedBigInteger('steel')->default(0);
            $table->unsignedBigInteger('oil')->default(0);
            $table->string('delivery_time')->default(now()->format("Y-m-d H:i:s"));
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_details');
    }
};
