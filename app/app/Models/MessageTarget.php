<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MessageTarget extends Model
{
    use HasFactory;

    protected $fillable = [
        'message_id',
        'user_id',
        'show_for_target',    ];

    public function message(){
        return $this->hasOne(Message::class, 'message_id', 'id');
    }

    public function messageSender() {
        return $this->belongsTo(User::class, 'sender_id', 'id');
    }

    public function messageTarget() {
        return $this->belongsTo(User::class, 'target_id', 'id');
    }

}
