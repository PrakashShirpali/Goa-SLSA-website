<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('english_schema.users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken(); // For "remember me" functionality
            $table->boolean('is_superuser')->default(false); // Add this line
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('english_schema.users');
    }
}
