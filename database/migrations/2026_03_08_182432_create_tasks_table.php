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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();

            // Link to the project
            $table->foreignId('project_id')->constrained()->cascadeOnDelete();

            // Link to the user/employee assigned
            $table->foreignId('assignee_id')->nullable()->constrained('users')->nullOnDelete();

            $table->string('name');
            $table->text('description')->nullable();

            // Task status
            $table->enum('status', ['todo', 'in_progress', 'done'])->default('todo');

            // Priority of the task
            $table->enum('priority', ['low', 'medium', 'high'])->default('medium');

            // Optional dates
            $table->date('start_date')->nullable();
            $table->date('due_date')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};