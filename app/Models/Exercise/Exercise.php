<?php

namespace App\Models\Exercise;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Exercise extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'skill_complexity',
        'image'
    ];

    // Many-to-Many با گروه عضلات
    public function muscleGroups()
    {
        return $this->belongsToMany(MuscleGroup::class, 'exercise_muscle_group');
    }

    // Many-to-Many با ابزارها
    public function tools()
    {
        return $this->belongsToMany(Tool::class, 'exercise_tool');
    }

    // Many-to-Many با انواع تمرین
    public function exerciseTypes()
    {
        return $this->belongsToMany(ExerciseType::class, 'exercise_type_exercise');
    }

    // Many-to-Many با برچسب‌ها
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'exercise_tag');
    }

    // One-to-Many با تمرین‌های روز برنامه
//    public function programDayExercises()
//    {
//        return $this->hasMany(\App\Models\Workout\ProgramDayExercise::class);
//    }

}
