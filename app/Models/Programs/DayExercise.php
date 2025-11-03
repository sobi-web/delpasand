<?php

namespace App\Models\Programs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DayExercise extends Model
{
    use HasFactory;

    protected $fillable = [
        'training_day_id',
        'exercise_id',
        'order',
    ];

    /**
     * ارتباط: متعلق به یک روز خاص است.
     */
    public function trainingDay()
    {
        return $this->belongsTo(TrainingDay::class);
    }

    /**
     * ارتباط: لینک به مدل اصلی Exercise
     */
    public function exercise()
    {
        return $this->belongsTo(Exercise::class);
    }

    /**
     * ارتباط: هر تمرین دارای چند ست است.
     */
    public function sets()
    {
        return $this->hasMany(ExerciseSet::class);
    }

    /**
     * شمارش ست‌ها
     */
    public function getSetsCountAttribute(): int
    {
        return $this->sets()->count();
    }

    /**
     * حذف cascade داخلی برای ست‌ها
     */
    protected static function booted(): void
    {
        static::deleting(function (DayExercise $exercise) {
            $exercise->sets()->each->delete();
        });
    }
}
