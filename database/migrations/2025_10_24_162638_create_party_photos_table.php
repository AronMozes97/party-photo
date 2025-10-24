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
        Schema::create('party_photos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('party_id')->constrained()->cascadeOnDelete();
            $table->foreignId('member_id')->constrained('party_members')->cascadeOnDelete();
            $table->string('image_path');
            $table->text('prompt')->nullable();
            $table->string('type')->default('photo'); // vagy selfie / ai_edit / upload
            $table->string('status')->default('active'); // active / hidden / deleted
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('party_photos');
    }
};
