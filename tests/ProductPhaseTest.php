<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProductPhaseTest extends TestCase
{

    /**
     * Tests if a logged in user can't visit the productphase index.
     *
     * @return void
     */
    public function testUserCantSeeProductPhase()
    {
        $user = factory(App\User::class)->create();

        $this->actingAs($user)
            ->visit('/productphase')
            ->dontSee('Productfases')
            ->see('Welkom')
            ->seePageIs('/');
    }

    /**
     * Tests if an admin can visit the productphase index.
     *
     * @return void
     */
    public function testAdminCanSeeProductPhase()
    {
        $this->seed('TestingDatabaseSeeder');
        $admin = factory(App\User::class, 'admin')->create();

        $this->actingAs($admin)
            ->visit('/productphase')
            ->see('Productfases')
            ->seePageIs('/productphase');
    }

    /**
     * Tests if an admin can create a new productphase.
     *
     * @return void
     */
    public function testAdminCanMakeProductPhase()
    {
        $this->seed('TestingDatabaseSeeder');
        $admin = factory(App\User::class, 'admin')->create();

        $this->actingAs($admin)
            ->visit('productphase/create')
            ->type('Test Productfase', 'name')
            ->press('Productfase aanmaken')
            ->see('Productfase toegevoegd!')
            ->seePageIs('/productphase')
            ->seeInDatabase('productphases', ['name' => 'Test Productfase']);
    }

    /**
     * Tests if an admin can't create a productphase that is already in
     * storage
     *
     * @return void
     */
    public function testAdminCantCreateDuplicateProductPhase()
    {
        $this->seed('TestingDatabaseSeeder');
        $admin = factory(App\User::class, 'admin')->create();

        $this->actingAs($admin)
            ->visit('productphase/create')
            ->type('Test Productfase', 'name')
            ->press('Productfase aanmaken')
            ->see('Productfase toegevoegd!')
            ->visit('productphase/create')
            ->type('Test Productfase', 'name')
            ->press('Productfase aanmaken')
            ->see('Productfase <strong>Test Productfase</strong> bestaat al');
    }

    /**
     * Tests if an admin can change the name of a productphase.
     *
     * @return void
     */
    public function testAdminCanChangeProductPhase()
    {
        $this->seed('TestingDatabaseSeeder');
        $productphase = factory(App\ProductPhase::class)->create([
            'name' => 'Oude Naam'
        ]);
        $admin = factory(App\User::class, 'admin')->create();

        $this->actingAs($admin)
            ->visit('/productphase/' . $productphase->id . '/edit')
            ->see('Wijzig productfase')
            ->type('Nieuwe Naam', 'name')
            ->press('Productfase wijzigen')
            ->see('Productfase bijgewerkt!')
            ->seePageIs('/productphase')
            ->seeInDatabase('productphases', ['id' => $productphase->id, 'name' => 'Nieuwe Naam'])
            ->dontSeeInDatabase('productphases', ['id' => $productphase->id, 'name' => 'Oude Naam']);
    }

    /**
     * Tests if an admin can delete a productphase
     *
     * @return void
     */
    public function testAdminCanDeleteProductPhase()
    {
        $this->seed('TestingDatabaseSeeder');
        $productphase = factory(App\ProductPhase::class)->create([
            'name' => 'Test Productfase'
        ]);
        $admin = factory(App\User::class, 'admin')->create();

        $this->actingAs($admin)
            ->visit('/productphase')
            ->see('Test Productfase')
            ->press('Verwijder')
            ->see('Productfase verwijderd!')
            ->seePageIs('/productphase')
            ->seeInDatabase('productphases', ['id' => $productphase->id, 'name' => 'Test Productfase']);
    }
}
