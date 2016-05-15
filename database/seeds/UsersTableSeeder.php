<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Voorbeeld Admin',
                'email' => 'admin@voorbeeld.imc',
                'password' => bcrypt('Admin123'),
                'user_role' => 'admin',
            ],
            [
                'name' => 'Voorbeeld Retailer',
                'email' => 'retailer@voorbeeld.imc',
                'password' => bcrypt('Retailer123'),
                'user_role' => 'retailer',
            ]
        ]);
    }
}
