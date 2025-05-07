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
        Schema::table('users', function (Blueprint $table) {
            $table->string('photo')->nullable(); // ফটো কলাম, নাল হতে পারে
            $table->boolean('status')->default(true); // স্ট্যাটাস কলাম, ডিফল্ট ভ্যালু true
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['photo', 'status']); // রিভার্স কলামগুলি ড্রপ করবে
        });
    }
};