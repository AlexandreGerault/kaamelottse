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
            ['name' => 'message.create'],
            ['name' => 'message.view'],
            ['name' => 'message.viewany'],
            ['name' => 'message.edit'],
            ['name' => 'message.update'],
            ['name' => 'message.delete'],
            ['name' => 'message.forcedelete'],
            ['name' => 'message.restore'],
            ['name' => 'message.respond'],
        ]);
        DB::table('permissions')->insert([
            ['name' => 'product'],
            ['name' => 'product.index'],
            ['name' => 'product.create'],
            ['name' => 'product.view'],
            ['name' => 'product.viewany'],
            ['name' => 'product.edit'],
            ['name' => 'product.update'],
            ['name' => 'product.delete'],
            ['name' => 'product.forcedelete'],
            ['name' => 'product.restore'],
        ]);
        DB::table('permissions')->insert([
            ['name' => 'order'],
            ['name' => 'order.index'],
            ['name' => 'order.create'],
            ['name' => 'order.create-for-others'],
            ['name' => 'order.view'],
            ['name' => 'order.viewany'],
            ['name' => 'order.edit'],
            ['name' => 'order.update'],
            ['name' => 'order.delete'],
            ['name' => 'order.forcedelete'],
            ['name' => 'order.restore'],
        ]);
    }
}
