<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('payslips', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained('employees')->cascadeOnDelete();
            $table->unsignedSmallInteger('period_month');
            $table->unsignedSmallInteger('period_year');
            $table->decimal('basic_salary', 10, 2)->nullable();
            $table->json('allowances')->nullable();
            $table->json('deductions')->nullable();
            $table->decimal('net_pay', 10, 2)->nullable();
            $table->timestamp('issued_at')->nullable();
            $table->string('pdf_path')->nullable();
            $table->timestamp('emailed_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payslips');
    }
};

