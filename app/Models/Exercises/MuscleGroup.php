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

    public static function hierarchy($parentId = null, $prefix = '')
    {
        $items = self::where('parent_id', $parentId)
            ->orderBy('name')
            ->get();

        $result = [];

        foreach ($items as $item) {
            $result[$item->id] = $prefix . $item->name;

            if ($item->children()->exists()) {
                $children = self::hierarchy($item->id, $prefix . '— ');
                $result = $result + $children;
            }
        }

        return $result;
    }


    public static function hierarchyOrderedIds($parentId = null)
    {
        $items = self::where('parent_id', $parentId)
            ->orderBy('name')
            ->get();

        $ids = [];

        foreach ($items as $item) {
            $ids[] = $item->id;

            if ($item->children()->exists()) {
                $ids = array_merge($ids, self::hierarchyOrderedIds($item->id));
            }
        }

        return $ids;
    }

}
