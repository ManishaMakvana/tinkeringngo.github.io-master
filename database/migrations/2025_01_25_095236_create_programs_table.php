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
        Schema::create('programs', function (Blueprint $table) {
            $table->id(); // Primary key auto increment
            $table->unsignedBigInteger('programid'); // Foreign key referencing 'programs' table
            $table->string('std', 50); // Standard (Class)
            $table->string('module_id', 50); // Module ID
            $table->string('document_type'); // Document type
            $table->string('title'); // Title of the module
            $table->text('publish_link')->nullable(); // Publish link
            $table->text('presentation_link')->nullable(); // Presentation link
            $table->text('youtube_voiceover')->nullable(); // YouTube voiceover link
            $table->text('google_slide')->nullable(); // Google slide link
            $table->text('worksheet')->nullable(); // Worksheet link
            $table->timestamps(); // Timestamps for created_at and updated_at

            // Foreign key constraint referencing 'programs' table
            $table->foreign('programid')->references('id')->on('programs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('programs');
    }
};
