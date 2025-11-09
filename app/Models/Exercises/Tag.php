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
}
