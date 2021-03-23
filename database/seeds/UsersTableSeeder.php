<?php


use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Fill 10 users in the database
     */
    public function run(): void
    {
        User::factory()->count(10)->create();

        User::factory()->createMany(
            [
                [
                    'name'     => env('TESTING_ADMIN'),
                    'email'    => env('TESTING_ADMIN_MAIL'),
                    'password' => Hash::make(env('TESTING_ADMIN_PASSWORD'))
                ],
                [
                    'name'     => env('TESTING_DELIVERY'),
                    'email'    => env('TESTING_DELIVERY_MAIL'),
                    'password' => Hash::make(env('TESTING_DELIVERY_PASSWORD'))
                ],
                [
                    'name'     => env('TESTING_EDITOR'),
                    'email'    => env('TESTING_EDITOR_MAIL'),
                    'password' => Hash::make(env('TESTING_EDITOR_PASSWORD'))
                ]
            ]
        );
    }
}
