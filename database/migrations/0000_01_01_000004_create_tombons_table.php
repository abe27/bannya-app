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
        Schema::create('tombons', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->foreignUlid('district_id')->constrained();
            $table->string('name');
            $table->string('en')->nullable();
            $table->integer('code')->unique();
            $table->string('zipcode')->nullable();
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
        Schema::dropIfExists('tombons');
    }
};
