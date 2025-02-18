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
        Schema::create('achievements', function (Blueprint $table) {
            $table->id();
              $table->string('secure_id')->nullable();
            $table->string('application_id')->nullable();
            $table->string('type_of_tournament')->nullable();
            $table->string('medal_or_participation')->nullable();
            $table->string('medal')->nullable();
            $table->string('name_of_tournament')->nullable();
            $table->string('category')->nullable();
            $table->string('name_of_sports_tournament')->nullable();
            $table->string('tournament_name')->nullable();
            $table->string('achievement_type');
            $table->date('date_of_achievement')->nullable();
            $table->string('achievement_certificate')->nullable();
            $table->string('age_group')->nullable();
            $table->string('tournament_organizer')->nullable();
            $table->string('verification_by_federations')->nullable();
            $table->decimal('cash_award_amount', 20, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('achievements');
    }
};
