<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'surname',
        'national_identification_number',
    ];

    public function users() {
        return $this->hasMany(User::class,  'person_id', 'id');
    }

    public function getRolesArr(): array {

        $personRoles = [];

        $roles = Role::all();

        $users = User::where('person_id', $this->id)->get();
        foreach ($roles as $_ => $role) {
            $user = $users->where('role_id', $role->id);
            $personRoles[$role->name] = $user->count() ? true : false;
        }

        return $personRoles;
    }
}
