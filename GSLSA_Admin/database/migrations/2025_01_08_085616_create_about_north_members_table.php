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
        Schema::create('english_schema.about_north_members', function (Blueprint $table) {
            $table->id();
            $table->text('role');
            $table->string('title')->nullable();
            $table->string('name');
            $table->string('post')->nullable();
            $table->text('image_path')->nullable();
            $table->integer('role_order')->nullable();
            $table->integer('priority')->nullable();
            $table->timestamps();
            $table->softDeletes();  // This adds the 'deleted_at' column
        });
        Schema::create('konkani_schema.about_north_members', function (Blueprint $table) {
            $table->id();
            $table->text('role');
            $table->string('title')->nullable();
            $table->string('name');
            $table->string('post')->nullable();
            $table->text('image_path')->nullable();
            $table->integer('role_order')->nullable();
            $table->integer('priority')->nullable();
            $table->timestamps();
            $table->softDeletes();  // This adds the 'deleted_at' column
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('english_schema.about_north_members');
        Schema::dropIfExists('konkani_schema.about_north_members');
    }
};
