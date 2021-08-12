<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'text',
        'file',
        'status',
        'user_id',
        'show_for_sender',
    ];

    public function messageSender() {
        return $this->belongsTo(User::class);
    }

    public function messageTargets() {
        return $this->belongsToMany(User::class);
    }



}


