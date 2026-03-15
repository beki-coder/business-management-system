<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('leaves', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('approved_by')->nullable()->constrained('users')->nullOnDelete();
            $table->enum('type', ['annual', 'sick', 'maternity', 'paternity', 'unpaid']);
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('days');
            $table->enum('status', ['pending','approved','rejected'])->default('pending');
            $table->text('reason');
            $table->timestamps();

            $table->index(['employee_id', 'status']);
        });
    }

    public function down(): void { Schema::dropIfExists('leaves'); }
};