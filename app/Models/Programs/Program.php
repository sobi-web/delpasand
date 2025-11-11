<?php

namespace App\Models\Programs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory ;
    protected $fillable = [
        'title',
        'description',
        'customer' ,
        'week_count',
    ];

    /**
     * ارتباط: هر برنامه شامل چند روز تمرینی است.
     */
    public function days()
    {
        return $this->hasMany(TrainingDay::class);
    }



    /**
     * شمارش روزهای برنامه
     */
    public function getDaysCountAttribute(): int
    {
        return $this->days()->count();
    }

    /**
     * برای حذف cascade خودکار در مدل (در هنگام حذف)
     */
    protected static function booted(): void
    {
        static::deleting(function (Program $program) {
            $program->days()->each->delete();
        });
    }

}
