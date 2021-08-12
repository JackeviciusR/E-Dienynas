<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;

    protected $fillable = [
        'grade',
        'is_edited',
        'status',
        'grade_type_id',
        'student_id',
        'student_group_id',
        'teacher_id',
        'schedule_id',
    ];

    public function editableGrade() {
        return $this->hasMany(EditableGrade::class, 'grade_id', 'id');
    }

    public function gradeType() {
        return $this->belongsTo(GradeType::class, 'grade_type_id', 'id');
    }

    public function schedule() {
        return $this->belongsTo(Schedule::class, 'schedule_id', 'id');
    }

    public function student() {
        return $this->belongsTo(User::class, 'student_id', 'id');
    }

    public function studentGroup() {
        return $this->belongsTo(StudentGroup::class, 'student_group_id', 'id');
    }

    public function teacher() {
        return $this->belongsTo(User::class, 'teacher_id', 'id');
    }
}
