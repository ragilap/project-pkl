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
        Schema::create('Galeries', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('file_path');
            $table->unsignedBigInteger('type_id');
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->timestamp('scheduled_at');
            $table->string('deskripsi');
            // $table->string('category_id');
            $table->timestamp('published_at')->nullable();
            $table->boolean('draft')->default(true);
            $table->timestamps();
            $table->foreign('parent_id')->references('id')->on('albums')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Galeries');
    }
};
