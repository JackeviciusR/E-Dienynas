<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EditableGrade extends Model
{
    use HasFactory;

    protected $fillable = [
        'grade',
        'grade_id',
        'teacher_id',
    ];

    public function grade() {
        return $this->belongsTo(Grade::class, 'grade_id', 'id');
    }

    public function teacher() {
        return $this->belongsTo(Teacher::class, 'teacher_id', 'id');
    }

}
