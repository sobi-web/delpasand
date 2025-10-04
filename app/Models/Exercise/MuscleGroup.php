<?php

namespace App\Models\Exercise;

use Illuminate\Database\Eloquent\Model;

class MuscleGroup extends Model
{
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
}
