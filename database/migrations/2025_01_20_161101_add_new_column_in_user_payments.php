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
        Schema::table('user_payments', function (Blueprint $table) {
            $table->enum('payment_type', ['annual', 'monthly', 'listing']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_payments', function (Blueprint $table) {
            $table->dropColumn('payment_type');
        });
    }
};