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
        Schema::create('businesses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->constrained('users', 'id')
                ->cascadeOnDelete();
            $table->string('title');
            $table->string('short_title');
            $table->enum('status', ['in_process', 'accepted', 'rejected'])->default('in_process');
            $table->string('cover_image');
            $table->string('cover_image_description')->nullable();
            $table->enum('have_source', ['yes', 'no'])->default('no');
            $table->string('source_url_one')->nullable();
            $table->string('source_url_two')->nullable();
            $table->string('source_url_three')->nullable();
            $table->text('first_description');
            $table->text('second_description')->nullable();
            $table->text('other_image')->nullable();
            $table->string('other_image_description')->nullable();
            $table->enum('policies', ['agree', 'disagree'])->default('agree');
            $table->string('podcast')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('businesses');
    }
};
