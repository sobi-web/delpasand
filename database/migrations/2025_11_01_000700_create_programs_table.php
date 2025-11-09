<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        /**
         * جدول برنامه‌ها (Programs)
         * -------------------------------------
         * این جدول اطلاعات کلی برنامه تمرینی را نگهداری می‌کند.
         */
        Schema::create('programs', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // عنوان برنامه مثلاً "برنامه حجمی ۸ هفته‌ای"
            $table->text('description')->nullable(); // توضیحات کلی برنامه
            $table->string('customer')->nullable();
            $table->timestamps();
        });


        /**
         * جدول روزهای تمرینی (TrainingDays)
         * -------------------------------------
         * برای مشخص کردن روزهای هفته در هر برنامه.
         * هر روز به یک Programs وابسته است.
         */
        Schema::create('training_days', function (Blueprint $table) {
            $table->id();
            $table->foreignId('program_id')
                ->constrained('programs')
                ->cascadeOnDelete();
            $table->string('title')->nullable(); // عنوان روز، مثلاً "روز سینه"
            $table->unsignedTinyInteger('day_of_week')->comment('1=شنبه, 2=یکشنبه, ..., 7=جمعه');
            $table->unsignedInteger('sort')->default(0);


        });


        /**
         * جدول تمرین‌های هر روز (DayExercises)
         * -------------------------------------
         * هر تمرین به یک روز تمرینی و یک مدل Exercise مرتبط است.
         */
        Schema::create('day_exercises', function (Blueprint $table) {
            $table->id();
            $table->foreignId('training_day_id')
                ->constrained('training_days')
                ->cascadeOnDelete();

            $table->foreignId('exercise_id')
                ->constrained('exercises')
                ->cascadeOnDelete();

            // فیلد order برای مرتب‌سازی تمرین‌ها در روز
            $table->unsignedInteger('order')->default(1);
        });


        /**
         * جدول ست‌ها (ExerciseSets)
         * -------------------------------------
         * جزئیات هر ست تمرین شامل تعداد، وزن و استراحت.
         */
        Schema::create('exercise_sets', function (Blueprint $table) {
            $table->id();

            $table->foreignId('day_exercise_id')
                ->constrained('day_exercises')
                ->cascadeOnDelete();

            $table->string('set_number')->default(1)->comment('شماره ست');
            $table->string('reps')->default(10)->comment('تعداد تکرار در ست');
            $table->string('tempo')->nullable()->comment('سرعت تمرین');
            $table->string('rest_seconds')->default(60)->comment('مدت استراحت بین ست‌ها بر حسب ثانیه');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('exercise_sets');
        Schema::dropIfExists('day_exercises');
        Schema::dropIfExists('training_days');
        Schema::dropIfExists('programs');
    }
};
