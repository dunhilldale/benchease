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
        Schema::create('shift_hours', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('user_id')->nullable();
            // $table->uuid('shift_days_id')->nullable();
            // $table->timestamp('shift_start', $precision = 0)->default(now());
            // $table->timestamp('shift_end', $precision = 0)->default(now());
            $table->string('shift_start');
            $table->string('shift_end');

            $table->uuid('created_by')->nullable();
            $table->uuid('updated_by')->nullable();
            $table->timestamps();
           
            $table->foreign('user_id')->references('id')->on('users');
            // $table->foreign('shift_days_id')->references('id')->on('shift_days');
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('updated_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shift_hours');
    }
};
