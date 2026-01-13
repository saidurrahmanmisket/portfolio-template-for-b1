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
        Schema::create('cms', function (Blueprint $table) {
            $table->id();
            $table->string('title', 200);
            $table->string('sub_title')->nullable()->default(null);
            $table->text('description')->nullable()->default(null);
            $table->text('sub_description')->nullable()->default(null);
            $table->string('image')->nullable()->default(null);
            $table->string('page_slug', 150)->unique();
            $table->string('section')->nullable()->default(null);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cms');
    }
};
