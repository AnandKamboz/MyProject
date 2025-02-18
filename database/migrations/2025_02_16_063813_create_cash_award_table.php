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
        Schema::create('cash_award', function (Blueprint $table) {
            $table->id();
             $table->string('secure_id')->nullable();
            $table->string('application_id')->nullable();
            $table->string('district_id')->nullable();
            $table->string('district')->nullable();
            $table->string('family_id')->nullable();
            $table->string('member_id')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('pan_number')->nullable();
            $table->enum('gender', ['M', 'F', 'T'])->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('mobile_number')->nullable();
            $table->string('pin_code')->nullable();
            $table->string('profile_photo')->nullable();
            $table->string('player_address')->nullable();
            $table->string('bank_account_number')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('bank_branch_address')->nullable();
            $table->string('ifsc_code')->nullable();
            $table->string('bank_proof_photo')->nullable();
            $table->string('pan_card_photo')->nullable();
            $table->string('haryana_domicile_photo')->nullable();
            $table->string('haryana_participation_certificate')->nullable();
            $table->string('signed_document')->nullable();
            $table->boolean('checkbox')->nullable();
            $table->boolean('is_completed')->nullable()->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cash_award');
    }
};
