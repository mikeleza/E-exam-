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


        // ตาราง user_info
        Schema::create('user_info', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->timestamps();
        });

        // ตาราง physical_tests
        Schema::create('physical_tests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('user_info')->onDelete('cascade');
            $table->boolean('color_blindness_test');
            $table->boolean('long_sightedness_test');
            $table->boolean('astigmatism_test');
            $table->boolean('response_test');
            $table->string('status');
            $table->timestamps();
        });

        // ตาราง theoretical_tests
        Schema::create('theoretical_tests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('user_info')->onDelete('cascade');
            $table->integer('traffic_sign_score');
            $table->integer('traffic_line_score');
            $table->integer('right_of_way_score');
            $table->integer('total_score');
            $table->string('status');
            $table->timestamps();
        });

        // ตาราง practical_tests
        Schema::create('practical_tests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('user_info')->onDelete('cascade');
            $table->string('status');
            $table->timestamps();
        });

        // ตาราง reports
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->integer('passed_count');
            $table->integer('failed_count');
            $table->timestamps();
        });

        // ตาราง test_records
        Schema::create('test_records', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('user_info')->onDelete('cascade');
            $table->foreignId('physical_test_id')->constrained()->onDelete('cascade');
            $table->foreignId('theoretical_test_id')->constrained()->onDelete('cascade');
            $table->foreignId('practical_test_id')->constrained()->onDelete('cascade');
            $table->string('overall_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('test_records');
        Schema::dropIfExists('reports');
        Schema::dropIfExists('practical_tests');
        Schema::dropIfExists('theoretical_tests');
        Schema::dropIfExists('physical_tests');
        Schema::dropIfExists('user_info');
    }
};
