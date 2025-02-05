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
        Schema::create('ad_social_links', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ad_listing_id')->constrained()->onDelete('cascade');
            $table->enum('media_type', ['instagram', 'facebook', 'snapchat', 'twitter', 'website']);
            $table->string('link');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ad_social_links');
    }
};
