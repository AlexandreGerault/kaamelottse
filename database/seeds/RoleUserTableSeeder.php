<?php

use App\Models\Role;
use App\User;
use Illuminate\Database\Seeder;

class RoleUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::all()->each(function (User $user) {
            if ($user->id == 31) return;
            $user->roles()->attach(Role::all()->random()->id);
        });

    }
}
