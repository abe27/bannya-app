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
        Schema::create('products', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->foreignUlid('company_id')->nullable()->constrained();
            $table->foreignUlid('branch_id')->nullable()->constrained();
            $table->foreignUlid('category_id')->nullable()->constrained();
            $table->foreignUlid('product_group_id')->nullable()->constrained();
            $table->foreignUlid('unit_id')->nullable()->constrained();
            $table->string('name');
            $table->string('no')->nullable();
            $table->string('common_name');
            $table->string('price')->nullable()->default(0);
            $table->longText('description')->nullable();
            $table->string('logo')->nullable();
            $table->foreignUlid('by_company')->nullable()->constrained('companies');
            $table->boolean('is_active')->nullable()->default(true);
            $table->timestamps();
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
