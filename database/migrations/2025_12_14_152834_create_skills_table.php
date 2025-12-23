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
        Schema::create('skills', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100)->unique();
            $table->string('sub_skills', 200)->nullable();
            $table->string('image', 150)->nullable();
            $table->timestamps();
        });
        \Illuminate\Support\Facades\DB::table('skills')->insert([
            [
                'name' => 'Backend',
                'sub_skills' => 'PHP, Laravel, JavaScript',
                'image' => 'programming.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Design',
                'sub_skills' => 'UI/UX, Figma',
                'image' => 'design.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skills');
    }
};
