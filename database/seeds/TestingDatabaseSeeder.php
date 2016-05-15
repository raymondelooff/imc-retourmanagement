<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class TestingDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(UserRolesTableSeeder::class);

        Model::reguard();
    }
}
