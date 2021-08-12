<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentGroup extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'teacher_id',
        'lesson_id',
        'schedule_id',
        'school_id',
    ];

    public function grades() {
        return $this->hasMany(Grade::class, 'student_id', 'id');
    }

    public function teacher() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function lesson() {
        return $this->belongsTo(Lesson::class, 'lesson_id', 'id');
    }

    public function schedule() {
        return $this->belongsTo(Schedule::class, 'schedule_id', 'id');
    }

    public function school() {
        return $this->belongsTo(School::class, 'school_id', 'id');
    }

    public function students() {
        return $this->belongsToMany(User::class);
    }

}
