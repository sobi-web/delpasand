<?php

namespace App\Models\Exercises;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tag extends Model
{
    protected $fillable = ['name', 'parent_id'];
    use HasFactory;


    public function parent()
    {
        return $this->belongsTo(Tag::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Tag::class, 'parent_id');
    }

    public function exercises()
    {
        return $this->belongsToMany(Exercise::class, 'exercise_tag');
    }
}
