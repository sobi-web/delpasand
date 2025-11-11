<?php

namespace App\Models\Programs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExerciseSet extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'day_exercise_id',
        'set_number',
        'reps',
        'tempo',
        'rest_seconds',
        'note'
    ];

    /**
     * ارتباط: هر ست مربوط به یک تمرین در روز خاص است.
     */
    public function exerciseItem()
    {
        return $this->belongsTo(DayExercise::class, 'day_exercise_id');
    }

    /**
     * برای نمایش نام تمرین مرتبط در جدول ست‌ها
     */
    public function exercise()
    {
        return $this->exerciseItem->exercise ?? null;
    }
}
