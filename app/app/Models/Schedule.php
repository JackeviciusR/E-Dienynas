<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'day_of_week',
        'lesson_number',
        'first_day',
        'last_day',
    ];

    public function grades() {
        return $this->hasMany(Grade::class, 'schedule_id', 'id');
    }

    public function group() {
        return $this->hasOne(StudentGroup::class, 'schedule_id', 'id');
    }

}
