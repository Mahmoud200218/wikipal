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
        Schema::create('quick_news', function (Blueprint $table) {
            $table->id();
            $table->foreignId('admin_id')
                ->constrained('admins', 'id')
                ->cascadeOnDelete();
            $table->string('title');
            $table->string('short_title');
            $table->string('cover_image')->nullable();
            $table->string('cover_image_description')->nullable();
            $table->text('first_description');
            $table->text('second_description')->nullable();
            $table->text('other_image')->nullable();
            $table->string('other_image_description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quick_news');
    }
};
