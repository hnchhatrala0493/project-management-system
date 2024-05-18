<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder {
    /**
    * Run the database seeds.
    *
    * @return void
    */

    public function run() {
        $adminRole = Role::create( [ 'name' => 'admin', 'guard_name'=>'web' ] );
        $userRole = Role::create( [ 'name' => 'user', 'guard_name'=>'web' ] );

        //$adminRole->givePermissionTo( 'all' );

    }
}