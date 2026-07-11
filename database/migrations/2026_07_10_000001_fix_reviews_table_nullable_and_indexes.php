<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('reviews', function (Blueprint $table) {
            // Change nullable columns to required
            $table->string('phone')->nullable(false)->change();
            $table->string('nationality')->nullable(false)->change();

            // Composite index for common queries (single-column indexes exist in create migration)
            $table->index(['is_approved', 'created_at']);
        });
    }

    public function down(): void
    {
        Schema::table('reviews', function (Blueprint $table) {
            // Revert nullable changes
            $table->string('phone')->nullable()->change();
            $table->string('nationality')->nullable()->change();
            
            $table->dropIndex(['is_approved', 'created_at']);
        });
    }
};
