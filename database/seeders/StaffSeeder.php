<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = User::create([
            'name' => 'Staff Dashboard',
            'email' => 'staff@staff.com',
            'password' => bcrypt('123456')
        ]);

        $role = Role::create(['name' => 'Staff']);

        $user->assignRole([$role->id]);
    }
}
