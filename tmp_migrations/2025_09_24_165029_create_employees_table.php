<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('full_name');
            $table->string('cnic', 13)->unique();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->text('current_address')->nullable();
            $table->text('permanent_address')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('father_name')->nullable();
            $table->string('guardian_name')->nullable();
            $table->text('education')->nullable();
            $table->date('joining_date')->nullable();
            $table->string('joining_position')->nullable();
            $table->enum('job_location', ['onsite','remote'])->default('onsite');
            $table->enum('job_status', ['non_paid_intern','paid_intern','probation','salaried','commissioned','per_hour','per_word'])->default('probation');
            $table->decimal('starting_salary', 10, 2)->nullable();
            $table->unsignedSmallInteger('probation_time_months')->nullable();
            $table->unsignedSmallInteger('internship_time_months')->nullable();
            $table->boolean('has_bank_account')->default(false);
            $table->string('bank_name')->nullable();
            $table->string('iban', 24)->nullable();
            $table->string('account_title')->nullable();
            $table->string('profile_photo_path')->nullable();
            $table->string('cnic_front_path')->nullable();
            $table->string('cnic_back_path')->nullable();
            $table->string('last_institute_certificate_path')->nullable();
            $table->string('cv_path')->nullable();
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('updated_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};

