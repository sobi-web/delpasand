<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        /**
         * ===========================
         * جدول اصلی تمرین‌ها
         * ===========================
         */
        Schema::create('exercises', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->enum('skill_complexity', ['Beginner', 'Intermediate', 'Advanced']);
            $table->string('image')->nullable();
            $table->timestamps();
        });

        /**
         * ===========================
         * دسته‌بندی‌ها با قابلیت Parent-Child
         * ===========================
         */
        Schema::create('muscle_groups', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('parent_id')->nullable()->constrained('muscle_groups')->cascadeOnDelete();
            $table->timestamps();
        });

        Schema::create('tools', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('parent_id')->nullable()->constrained('tools')->cascadeOnDelete();
            $table->timestamps();
        });

        Schema::create('exercise_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('parent_id')->nullable()->constrained('exercise_types')->cascadeOnDelete();
            $table->timestamps();
        });

        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('parent_id')->nullable()->constrained('tags')->cascadeOnDelete();
            $table->timestamps();
        });

        /**
         * ===========================
         * Pivot Tables - رابطه Many-to-Many
         * ===========================
         */
        Schema::create('exercise_muscle_group', function (Blueprint $table) {
            $table->id();
            $table->foreignId('exercise_id')->constrained()->cascadeOnDelete();
            $table->foreignId('muscle_group_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });

        Schema::create('exercise_tool', function (Blueprint $table) {
            $table->id();
            $table->foreignId('exercise_id')->constrained()->cascadeOnDelete();
            $table->foreignId('tool_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });

        Schema::create('exercise_type_exercise', function (Blueprint $table) {
            $table->id();
            $table->foreignId('exercise_id')->constrained()->cascadeOnDelete();
            $table->foreignId('exercise_type_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });

        Schema::create('exercise_tag', function (Blueprint $table) {
            $table->id();
            $table->foreignId('exercise_id')->constrained()->cascadeOnDelete();
            $table->foreignId('tag_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('exercise_tag');
        Schema::dropIfExists('exercise_type_exercise');
        Schema::dropIfExists('exercise_tool');
        Schema::dropIfExists('exercise_muscle_group');

        Schema::dropIfExists('tags');
        Schema::dropIfExists('exercise_types');
        Schema::dropIfExists('tools');
        Schema::dropIfExists('muscle_groups');
        Schema::dropIfExists('exercises');
    }
};
