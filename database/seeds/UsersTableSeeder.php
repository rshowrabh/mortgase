<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            [
                'name' => 'admin',
                'email' => 'admin@admin.com',
                'password' => bcrypt('12345678'),
            ],
            [
                'name' => 'brokerage',
                'email' => 'broker@gmail.com',
                'password' => bcrypt('12345678'),
            ],
            [
                'name' => 'agent',
                'email' => 'agent@agent.com',
                'password' => bcrypt('12345678'),
            ],
            [
                'name' => 'client',
                'email' => 'client@client.com',
                'password' => bcrypt('12345678'),
            ],


        ]);
        User::find(1)->roles()->attach(1);
        User::find(2)->roles()->attach(4);
        User::find(3)->roles()->attach(2);
        User::find(3)->roles()->attach(3);
    }
}
