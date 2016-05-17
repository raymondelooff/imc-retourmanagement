<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Kirkbater\Testing\SoftDeletes;

class RetailerCrudTest extends TestCase
{
    use SoftDeletes;

    /**
     * Tests if a logged in user can't visit the retailer index.
     *
     * @return void
     */
    public function testUserCantAccessRetailerIndex()
    {
        $user = factory(App\User::class)->create();

        $this->actingAs($user)
            ->visit('/retailer')
            ->dontSee('Retailers')
            ->see('Welkom')
            ->seePageIs('/');
    }

    /**
     * Tests if an admin can visit the retailer index.
     *
     * @return void
     */
    public function testAdminCanAccessRetailerIndex()
    {
        $this->seed('TestingDatabaseSeeder');
        $admin = factory(App\User::class, 'admin')->create();

        $this->actingAs($admin)
            ->visit('/retailer')
            ->see('Retailers')
            ->seePageIs('/retailer');
    }

    /**
     * Tests if an admin can create a new retailer.
     *
     * @return void
     */
    public function testAdminCanCreateRetailer()
    {
        $this->seed('TestingDatabaseSeeder');
        $admin = factory(App\User::class, 'admin')->create();

        $this->actingAs($admin)
            ->visit('retailer/create')
            ->type('Test Retailer', 'name')
            ->press('Retailer aanmaken')
            ->see('Retailer aangemaakt!')
            ->seePageIs('/retailer')
            ->seeInDatabase('retailers', ['name' => 'Test Retailer']);
    }

    /**
     * Tests if an admin can't create a retailer that is already in
     * storage
     *
     * @return void
     */
    public function testAdminCantCreateRetailerAlreadyInDatabase()
    {
        $this->seed('TestingDatabaseSeeder');
        $admin = factory(App\User::class, 'admin')->create();

        $this->actingAs($admin)
            ->visit('retailer/create')
            ->type('Test Retailer', 'name')
            ->press('Retailer aanmaken')
            ->see('Retailer aangemaakt!')
            ->visit('retailer/create')
            ->type('Test Retailer', 'name')
            ->press('Retailer aanmaken')
            ->see('name is al in gebruik');
    }

    /**
     * Tests if an admin can change the name of a retailer.
     *
     * @return void
     */
    public function testAdminCanChangeRetailerName()
    {
        $this->seed('TestingDatabaseSeeder');
        $retailer = factory(App\Retailer::class)->create([
            'name' => 'Oude Naam'
        ]);
        $admin = factory(App\User::class, 'admin')->create();

        $this->actingAs($admin)
            ->visit('/retailer/' . $retailer->id . '/edit')
            ->see('Wijzig retailer')
            ->type('Nieuwe Naam', 'name')
            ->press('Retailer wijzigen')
            ->see('Retailer bijgewerkt!')
            ->seePageIs('/retailer/' . $retailer->id)
            ->seeInDatabase('retailers', ['id' => $retailer->id, 'name' => 'Nieuwe Naam'])
            ->dontSeeInDatabase('retailers', ['id' => $retailer->id, 'name' => 'Oude Naam']);
    }

    /**
     * Tests if an admin can delete a retailer
     *
     * @return void
     */
    public function testAdminCanDeleteRetailer()
    {
        $this->seed('TestingDatabaseSeeder');
        $retailer = factory(App\Retailer::class)->create([
            'name' => 'Test Retailer'
        ]);
        $admin = factory(App\User::class, 'admin')->create();

        $this->actingAs($admin)
            ->visit('/retailer')
            ->see('Test Retailer')
            ->press('Verwijder')
            ->see('Retailer verwijderd!')
            ->seePageIs('/retailer')
            ->seeInDatabase('retailers', ['id' => $retailer->id, 'name' => 'Test Retailer'])
            ->seeIsSoftDeletedInDatabase('retailers', ['id' => $retailer->id]);
    }
}
