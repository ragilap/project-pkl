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
        Schema::create('albumvideos', function (Blueprint $table) {
            $table->id();
            $table->string('nama_album')->unique();
            $table->string('gambar_album');
            $table->timestamp('scheduled_at')->nullable();
            $table->string('category_id');
            $table->timestamp('published_at')->nullable();
            $table->unsignedBigInteger('type_id');
            $table->integer('order')->default(0);
            $table->boolean('draft')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('albumvideos');
    }
};
