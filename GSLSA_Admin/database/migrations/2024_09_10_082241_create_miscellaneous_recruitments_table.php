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
        Schema::create('english_schema.miscellaneous_recruitments', function (Blueprint $table) {
            $table->id();
            $table->text('recruitment_notice');
            $table->text('path');
            $table->timestamps();
            $table->softDeletes();  // This adds the 'deleted_at' column
        });
        Schema::create('konkani_schema.miscellaneous_recruitments', function (Blueprint $table) {
            $table->id();
            $table->text('recruitment_notice');
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
        Schema::dropIfExists('english_schema.miscellaneous_recruitments');
        Schema::dropIfExists('konkani_schema.miscellaneous_recruitments');
    }
};
