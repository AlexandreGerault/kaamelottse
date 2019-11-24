<?php

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class PermissionRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::whereName('administrateur')
            ->first()
            ->permissions()
            ->attach(Permission::whereName('message')->first()->id);

        Role::whereName('administrateur')
            ->first()
            ->permissions()
            ->attach(Permission::whereName('order')->first()->id);

        Role::whereName('administrateur')
            ->first()
            ->permissions()
            ->attach(Permission::whereName('product')->first()->id);

        Role::whereName('livreur')
            ->first()
            ->permissions()
            ->attach(Permission::whereName('deliver')->first()->id);

        Role::whereName('éditeur')
            ->first()
            ->permissions()
            ->attach(Permission::whereName('quote')->first()->id);
        Role::whereName('éditeur')
            ->first()
            ->permissions()
            ->attach(Permission::whereName('message')->first()->id);
        Role::whereName('éditeur')
            ->first()
            ->permissions()
            ->attach(Permission::whereName('article')->first()->id);


    }
}
