<?php


use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Fill 10 users in the database
     */
    public function run(): void
    {
        factory(User::class, 10)->create();
    }
}
