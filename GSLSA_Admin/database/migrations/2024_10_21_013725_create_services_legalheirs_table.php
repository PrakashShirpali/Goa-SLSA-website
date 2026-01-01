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
        Schema::create('english_schema.services_legalheirs', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->text('role');
            $table->text('contact_no');
            $table->text('path');
            $table->timestamps();
            $table->softDeletes();  // This adds the 'deleted_at' column
        });
        Schema::create('konkani_schema.services_legalheirs', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->text('role');
            $table->text('contact_no');
            $table->text('path');
            $table->timestamps();
            $table->softDeletes();  // This adds the 'deleted_at' column
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('english_schema.services_legalheirs');
        Schema::dropIfExists('konkani_schema.services_legalheirs');
    }
};
