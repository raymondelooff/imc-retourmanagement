<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserManagementTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testUserIndex()
    {
        $user = factory(App\User::class, 'admin')->make();

        $this->actingAs($user)
             ->visit('/')
             ->see('Welkom');
    }
}
