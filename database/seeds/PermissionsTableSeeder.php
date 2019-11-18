<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            ['name' => 'message'],
            ['name' => 'message.index'],
            ['name' => 'message.view'],
            ['name' => 'message.viewany'],
            ['name' => 'message.edit'],
            ['name' => 'message.update'],
            ['name' => 'message.delete'],
            ['name' => 'message.forcedelete'],
            ['name' => 'message.restore'],
            ['name' => 'message.respond'],
        ]);
    }
}
