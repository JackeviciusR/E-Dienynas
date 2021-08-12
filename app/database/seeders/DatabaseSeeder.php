<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $roles = ['SUPER-ADMIN','ADMIN','STUDENT','TEACHER','PARENT'];

        foreach($roles as $role) {
            DB::table('roles')->insert([
                'name' => $role,
                'created_at'=> now(),
                'updated_at'=> now(),
            ]);
        }

        DB::table('users')->insert([
            'username'=> 'username',
            'email' => 'superadmin@admin',
            'role_id'=>1,
            'person_id'=>null,
            'email_verified_at' => now(),
            'password' => Hash::make('slaptazodis'),
            'remember_token' => Str::random(10),
            'created_at'=> now(),
            'updated_at'=> now(),
        ]);

         \App\Models\Person::factory(10)->create();
         \App\Models\User::factory(4)->create();
         \App\Models\School::factory(5)->create();
    }
}
