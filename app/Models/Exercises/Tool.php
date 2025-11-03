<?php

namespace App\Models\Exercises;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Tool extends Model
{
    use HasFactory;

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
