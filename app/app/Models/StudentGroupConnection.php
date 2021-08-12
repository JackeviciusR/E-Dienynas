<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentGroupConnection extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'student_group_id',
    ];

    protected $table = 'student_connect_student_groups';

}
