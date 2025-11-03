<?php

namespace App\Models\Exercises;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MuscleGroup extends Model
{
        use HasFactory;

    protected $fillable = ['name', 'parent_id'];

    public function parent()
    {
        return $this->belongsTo(MuscleGroup::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(MuscleGroup::class, 'parent_id');
    }

    public function exercises()
    {
        return $this->belongsToMany(Exercise::class, 'exercise_muscle_group');
    }

    public function ParrentName() {
        if ($this->parent_id() != null) {

        }
    }
}
