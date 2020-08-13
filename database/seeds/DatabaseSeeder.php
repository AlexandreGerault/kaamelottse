<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(QuotesTableSeeder::class);
//        $this->call(ArticlesTableSeeder::class);
//        $this->call(ProductsTableSeeder::class);
//        $this->call(OrdersTableSeeder::class);

        $this->call(RolesTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
//        $this->call(PermissionRoleTableSeeder::class);
//        $this->call(RoleUserTableSeeder::class);
    }
}
