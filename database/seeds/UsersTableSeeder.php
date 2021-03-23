<?php


use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Fill 10 users in the database
     */
    public function run(): void
    {
        User::factory()->count(10)->create();
    }
}
