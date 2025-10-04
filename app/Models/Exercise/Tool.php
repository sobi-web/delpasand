<?php

namespace App\Models\Exercise;

use Illuminate\Database\Eloquent\Model;

class Tool extends Model
{
    protected $fillable = ['name', 'parent_id'];

    public function parent()
    {
        return $this->belongsTo(Tool::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Tool::class, 'parent_id');
    }

    public function exercises()
    {
        return $this->belongsToMany(Exercise::class, 'exercise_tool');
    }
}
