<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = factory(User::class, 30)->create();

        if(env('TESTING_ADMIN') && env('TESTING_ADMIN_MAIL') && env('TESTING_ADMIN_PASSWORD')) {
            $admin = new User;
            $admin->name = env('TESTING_ADMIN');
            $admin->email = env('TESTING_ADMIN_MAIL');
            $admin->password = Hash::make(env('TESTING_ADMIN_PASSWORD'));
            $admin->save();
        }
    }
}
