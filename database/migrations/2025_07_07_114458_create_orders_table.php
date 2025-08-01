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
            $table->ulid('id')->primary();
            $table->foreignUlid('company_id')->nullable()->constrained();
            $table->foreignUlid('branch_id')->nullable()->constrained();
            $table->foreignUlid('user_id')->constrained();
            $table->foreignUlid('coupon_id')->nullable()->constrained();
            $table->foreignUlid('order_status_id')->constrained();
            $table->string('order_no');
            $table->dateTime('order_date');
            $table->dateTime('delivery_date');
            $table->longText('description')->nullable();
            $table->boolean('is_active')->nullable()->default(true);
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
