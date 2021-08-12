<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $table = 'users';

    protected $fillable = [
        'username',
        'email',
        'role_id',
        'person_id',
        'school_id',
    ];

    public function editableGrades() {
        return $this->hasMany(EditableGrade::class, 'teacher_id', 'id');
    }

    public function groups() {
        return $this->hasMany(StudentGroup::class, 'teacher_id', 'id');
    }

    public function teachers() {
        return $this->hasMany(Teacher::class, 'teacher_id', 'id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function schools() {
        return $this->belongsToMany(School::class, 'teacher_connect_schools');
    }


}
