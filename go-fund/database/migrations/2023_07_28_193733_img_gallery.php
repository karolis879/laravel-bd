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
        Schema::create('img_gallery', function (Blueprint $table) {
            $table->id();
            $table->binary('image')->nullable(); // Adding the 'image' column of type BLOB
            $table->json('gallery')->nullable(); // Adding the 'gallery' column to store photo URLs
            $table->unsignedBigInteger('author_id');
            $table->foreign('author_id')->references('id')->on('stories')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('img_gallery');
    }
};
