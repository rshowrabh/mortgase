<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::insert([
            ['name' => 'admin', 'id' => 1],
            ['name' => 'agent', 'id' => 2],
            ['name' => 'client', 'id' => 3],

        ]);
    }
}
