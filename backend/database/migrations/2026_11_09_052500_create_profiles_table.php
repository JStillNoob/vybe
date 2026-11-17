<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('user_id')->unique()->constrained('users')->cascadeOnDelete();
            $table->string('username', 100)->unique();
            $table->string('slug', 100)->unique()->index();
            $table->string('display_name', 150)->nullable();
            $table->string('title', 100)->default('Main Profile');
            $table->string('first_name', 100)->nullable();
            $table->string('last_name', 100)->nullable();
            $table->string('prefix', 20)->nullable();
            $table->string('headline', 255)->nullable();
            $table->string('company', 150)->nullable();
            $table->string('department', 150)->nullable();
            $table->text('bio')->nullable();
            $table->text('avatar_url')->nullable();
            $table->text('banner_url')->nullable();
            $table->string('theme', 50)->default('professional');
            $table->boolean('is_verified')->default(false);
            $table->boolean('is_active')->default(true);
            $table->boolean('is_public')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
