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
                'activated' => true,
                'verified' => true
            ],
            [
                'name' => 'Voorbeeld Retailer',
                'email' => 'retailer@voorbeeld.imc',
                'password' => bcrypt('Retailer123'),
                'user_role' => 'retailer',
                'activated' => true,
                'verified' => true
            ],
            [
                'name' => 'Voorbeeld Gebruiker',
                'email' => 'gebruiker@voorbeeld.imc',
                'password' => bcrypt('Gebruiker123'),
                'user_role' => 'user',
                'activated' => true,
                'verified' => true
            ]
        ]);
    }
}
