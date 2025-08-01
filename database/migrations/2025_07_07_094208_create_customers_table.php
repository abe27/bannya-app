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
        Schema::create('customers', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->string('name');
            $table->string('license_no')->unique();
            $table->foreignUlid('feature_data_id')->constrained();
            ######### document #########
            $table->string('professional_license');
            $table->string('business_license');
            $table->string('operating_license');
            $table->string('commercial_registration')->nullable();
            $table->string('national_id_card');
            $table->string('other_documents')->nullable();
            $table->string('storefront_photo')->nullable();
            ######## contact ########
            $table->longText('address');
            $table->foreignUlid('geography_id')->nullable()->constrained();
            $table->foreignUlid('province_id')->constrained();
            $table->foreignUlid('district_id')->constrained();
            $table->foreignUlid('tombon_id')->constrained();
            $table->string('zipcode');
            $table->dateTime('date_of_received');
            $table->string('contact_person');
            $table->string('contact_nation_no');
            $table->string('contact_email')->nullable();
            $table->string('contact_phone');
            ######### user ##########
            $table->foreignUlid('user_id')->constrained();
            $table->boolean('is_active')->nullable()->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
