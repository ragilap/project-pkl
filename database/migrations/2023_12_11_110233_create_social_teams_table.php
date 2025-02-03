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
        Schema::create('social_teams', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('link');
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->string('icon');
            $table->timestamps();
            $table->foreign('parent_id')->references('id')->on('teams')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('social_teams');
    }
};
