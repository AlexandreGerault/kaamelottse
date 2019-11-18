<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')
            ->insertMany([
                [ 'id' => 0, 'name' => 'utilisateur' ],
                [ 'id' => 1, 'name' => 'éditeur'],
                [ 'id' => 2, 'name' => 'administrateur']
            ]);
    }
}
