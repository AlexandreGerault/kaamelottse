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
        if(env('TESTING_DELIVERY') && env('TESTING_DELIVERY_MAIL') && env('TESTING_DELIVERY_PASSWORD')) {
            $admin = new User;
            $admin->name = env('TESTING_DELIVERY');
            $admin->email = env('TESTING_DELIVERY_MAIL');
            $admin->password = Hash::make(env('TESTING_DELIVERY_PASSWORD'));
            $admin->save();
        }
        if(env('TESTING_EDITOR') && env('TESTING_EDITOR_MAIL') && env('TESTING_EDITOR_PASSWORD')) {
            $admin = new User;
            $admin->name = env('TESTING_EDITOR');
            $admin->email = env('TESTING_EDITOR_MAIL');
            $admin->password = Hash::make(env('TESTING_EDITOR_PASSWORD'));
            $admin->save();
        }
    }
}
