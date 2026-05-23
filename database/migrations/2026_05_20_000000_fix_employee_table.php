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
        // If the incorrectly named table exists, rename it.
        if (Schema::hasTable('employee_tb_')) {
            Schema::rename('employee_tb_', 'employee_tbl');
            return;
        }

        // If the expected table doesn't exist, create it.
        if (! Schema::hasTable('employee_tbl')) {
            Schema::create('employee_tbl', function (Blueprint $table) {
                $table->id();
                $table->string('fname');
                $table->string('lname');
                $table->string('midname');
                $table->integer('age');
                $table->string('address');
                $table->integer('zip');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('employee_tbl')) {
            Schema::dropIfExists('employee_tbl');
        }
    }
};
