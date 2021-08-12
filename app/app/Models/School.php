<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'city',
        'address',
        ];

    public function gradeType() {
        return $this->hasMany(GradeType::class, 'grade_id', 'id');
    }

    public function user() {
        return $this->hasMany(User::class, 'user_id', 'id');
    }

    public function groups() {
        return $this->hasMany(StudentGroup::class, 'school_id', 'id');
    }

    public function students() {
        //
    }

    public function teachers() {
        //
    }


}
