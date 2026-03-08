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
            // Add company_id after email_verified_at
            $table->foreignId('company_id')
                  ->nullable()
                  ->after('email_verified_at')
                  ->constrained('companies')  // References companies table
                  ->nullOnDelete();           // Set NULL when company deleted

            // Add role after company_id
            $table->enum('role', ['admin', 'manager', 'employee'])
                  ->default('employee')
                  ->after('company_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Drop foreign key first, then column
            $table->dropForeign(['company_id']);
            $table->dropColumn(['company_id', 'role']);
        });
    }
};
