<?php

namespace App\Models;

use App\Http\Filters\UserFilter;
use Illuminate\Contracts\Auth\MustVerifyEmail;
//use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'role_id',
        'person_id',
        'school_id',
    ];
//    public $timestamps = false;
//    protected $guarded = [''];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function person() {
        return $this->belongsTo(Person::class, 'person_id', 'id');
    }

    public function role() {
        return $this->belongsTo(Role::class, 'role_id', 'id');
    }

    public function school() {
        return $this->belongsTo(School::class, 'school_id', 'id');
    }

    public function groups() {
        return $this->belongsToMany(StudentGroup::class);
    }

    public function receivedMessages() {
        return $this->belongsToMany(Message::class);
    }

    public function grades() {
        return $this->hasMany(Grade::class, 'student_id', 'id');
    }

    public function sendedMessages() {
        return $this->hasMany(Message::class, 'user_id', 'id');
    }

//    public function scopeFilter(Builder $builder, $request)
//    {
//        return (new UserFilter($request))->filter($builder);
//    }

}
