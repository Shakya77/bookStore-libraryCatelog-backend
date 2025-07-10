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
        Schema::create('book_editions', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('book_id');
            $table->foreign('book_id')->references('id')->on('books');

            $table->text('cover_image')->nullable();
            $table->string('isbn')->nullable();
            $table->string('format')->nullable()->comment('PDF, EPUB, Hardcover'); // PDF, EPUB, Hardcover, etc.

            $table->boolean('is_active')->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_editions');
    }
};
