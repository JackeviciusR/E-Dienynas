<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'username',
        'email',
        'role_id',
        'person_id',
        'school_id',
    ];

    public function grades() {
        return $this->hasMany(Grade::class, 'student_id', 'id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function school() {
        return $this->belongsTo(School::class, 'school_id', 'id');
    }

    public function groups() {
        return $this->belongsToMany(StudentGroup::class);
    }

}
