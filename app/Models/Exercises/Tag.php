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
        // در اینجا، ما به صورت صریح می گوییم که جدول دوم (که به آن ارجاع می دهیم) باید نام مستعار 'parent_tool' داشته باشد
        return $this->belongsTo(Tag::class, 'parent_id', 'id')
            ->select('tags.*'); // بهتر است ستون‌ها را مشخص کنید
    }

// 2. رابطه فرزند (Children)
    public function children()
    {
        // در اینجا، ما به صورت صریح می گوییم که جدول دوم (که با آن Join می شویم) باید نام مستعار 'child_tool' داشته باشد
        return $this->hasMany(Tag::class, 'parent_id', 'id')
            ->select('tags.*'); // بهتر است ستون‌ها را مشخص کنید
    }
    public function exercises()
    {
        return $this->belongsToMany(Exercise::class, 'exercise_tag');
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
