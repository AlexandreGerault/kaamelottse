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
            if ($user->id > 30) return;
            $user->roles()->attach(Role::all()->random()->id);
        });

        if($name = env('TESTING_ADMIN')) {
            $user = User::where('name', $name)->first();
            $user->roles()->attach([1,2,3]);
            $user->save();
        }
        if($name = env('TESTING_DELIVERY')) {
            $user = User::where('name', $name)->first();
            $user->roles()->attach(Role::where('name', 'livreur')->first()->id);
            $user->save();
        }
        if($name = env('TESTING_EDITOR')) {
            $user = User::where('name', $name)->first();
            $user->roles()->attach(Role::where('name', 'éditeur')->first()->id);
            $user->save();
        }
    }
}
