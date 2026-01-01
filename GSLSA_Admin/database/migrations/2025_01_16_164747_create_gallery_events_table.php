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
        Schema::create('english_schema.gallery_events', function (Blueprint $table) {
            $table->id();
            $table->string('event_title')->nullable();
            $table->text('event_description')->nullable();
            $table->string('slug')->unique(); // Unique folder name
            $table->date('event_date')->nullable();
            $table->string('thumbnail_path')->nullable();
            $table->timestamps();
            $table->softDeletes(); // Adds 'deleted_at' column
        });
        Schema::create('konkani_schema.gallery_events', function (Blueprint $table) {
            $table->id();
            $table->string('event_title')->nullable();
            $table->text('event_description')->nullable();
            $table->string('slug')->unique(); // Unique folder name
            $table->date('event_date')->nullable();
            $table->string('thumbnail_path')->nullable();
            $table->timestamps();
            $table->softDeletes(); // Adds 'deleted_at' column
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('english_schema.gallery_events');
        Schema::dropIfExists('konkani_schema.gallery_events');
    }
};
