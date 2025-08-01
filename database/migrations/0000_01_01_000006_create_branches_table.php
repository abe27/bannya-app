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
        Schema::create('branches', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->foreignUlid('company_id')->constrained();
            $table->string('name')->unique();
            $table->string('license_no');
            $table->longText('address');
            $table->foreignUlid('geography_id')->constrained();
            $table->foreignUlid('province_id')->constrained();
            $table->foreignUlid('district_id')->constrained();
            $table->foreignUlid('tombon_id')->constrained();
            $table->string('zipcode');
            $table->longText('description')->nullable();
            $table->string('logo')->nullable();
            $table->boolean('is_active')->nullable()->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('branches');
    }
};
