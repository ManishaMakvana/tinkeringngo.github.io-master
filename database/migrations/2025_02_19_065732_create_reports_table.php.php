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
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('programid')->constrained('programs')->onDelete('cascade');
            $table->string('title');
            $table->string('school');
            $table->string('username'); // Trainer's username
            $table->string('activity_name');
            $table->string('category'); // Boys/Girls/Teacher (comma-separated values)
            $table->date('due_date');
            $table->text('basic_description');
            $table->enum('status', ['pending', 'completed', 'canceled'])->default('pending');
            $table->string('google_photos')->nullable();
            $table->string('hero_pic')->nullable();
            $table->timestamps();
        });
    
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
