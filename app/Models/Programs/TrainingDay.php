<?php

namespace App\Models\Programs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingDay extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'program_id',
        'title',
        'day_of_week',
    ];

    /**
     * ارتباط: هر روز متعلق به یک برنامه است.
     */
    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    /**
     * ارتباط: هر روز شامل چند تمرین است.
     */
    public function exercises()
    {
        return $this->hasMany(DayExercise::class);
    }

    /**
     * شمارش تمرین‌ها
     */
    public function getExercisesCountAttribute(): int
    {
        return $this->exercises()->count();
    }

    /**
     * حذف cascade داخلی برای تمرین‌ها
     */
//    protected static function booted(): void
//    {
//        static::deleting(function (TrainingDay $day) {
//            $day->exercises()->each->delete();
//        });
//    }
}
