<?php

namespace App\Models\Exercises;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class ExerciseType extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'parent_id'];

    public function parent()
    {
        return $this->belongsTo(ExerciseType::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(ExerciseType::class, 'parent_id');
    }

    public function exercises()
    {
        return $this->belongsToMany(Exercise::class, 'exercise_type_exercise');
    }
}
