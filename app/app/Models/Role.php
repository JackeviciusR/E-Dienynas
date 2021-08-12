<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function users() {
        $this->hasMany('App\Models\User', 'role_id', 'id');
    }

    public function roleIndex(string $roleName): int {
        $index = Role::query()->where('role','=',$roleName)->value('id');
        return $index;
    }

}
