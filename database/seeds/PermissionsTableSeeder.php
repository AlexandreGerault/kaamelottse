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

        DB::table('permissions')->insert([
            ['name' => 'article'],
            ['name' => 'article.index'],
            ['name' => 'article.create'],
            ['name' => 'article.view'],
            ['name' => 'article.viewany'],
            ['name' => 'article.edit'],
            ['name' => 'article.update'],
            ['name' => 'article.delete'],
            ['name' => 'article.forcedelete'],
            ['name' => 'article.restore'],
        ]);

        DB::table('permissions')->insert([
            ['name' => 'quote'],
            ['name' => 'quote.index'],
            ['name' => 'quote.create'],
            ['name' => 'quote.view'],
            ['name' => 'quote.viewany'],
            ['name' => 'quote.edit'],
            ['name' => 'quote.update'],
            ['name' => 'quote.delete'],
            ['name' => 'quote.forcedelete'],
            ['name' => 'quote.restore'],
        ]);

        DB::table('permissions')->insert([
            ['name' => 'deliver'],
        ]);
    }
}
