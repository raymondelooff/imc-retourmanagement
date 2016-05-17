<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProductPhaseTest extends TestCase
{

    /**
     * Tests if a logged in user can't visit the product phase index.
     *
     * @return void
     */
    public function testUserCantSeeProductPhase()
    {
        $user = factory(App\User::class)->create();

        $this->actingAs($user)
            ->visit('/product-phase')
            ->dontSee('<h1>Productfases</h1>')
            ->see('Welkom')
            ->seePageIs('/');
    }

    /**
     * Tests if an admin can visit the product phase index.
     *
     * @return void
     */
    public function testAdminCanSeeProductPhase()
    {
        $this->seed('TestingDatabaseSeeder');
        $admin = factory(App\User::class, 'admin')->create();

        $this->actingAs($admin)
            ->visit('/product-phase')
            ->see('Productfases')
            ->seePageIs('/product-phase');
    }

    /**
     * Tests if an admin can create a new product phase.
     *
     * @return void
     */
    public function testAdminCanMakeProductPhase()
    {
        $this->seed('TestingDatabaseSeeder');
        $admin = factory(App\User::class, 'admin')->create();

        $this->actingAs($admin)
            ->visit('/product-phase/create')
            ->type('Test Productfase', 'name')
            ->press('Productfase aanmaken')
            ->see('Productfase toegevoegd!')
            ->seePageIs('/product-phase')
            ->seeInDatabase('productphases', ['name' => 'Test Productfase']);
    }

    /**
     * Tests if an admin can't create a product phase that is already in
     * storage
     *
     * @return void
     */
    public function testAdminCantCreateDuplicateProductPhase()
    {
        $this->seed('TestingDatabaseSeeder');
        $productphase = factory(App\ProductPhase::class)->create([
            'name' => 'Dubbele Productfase'
        ]);
        $admin = factory(App\User::class, 'admin')->create();

        $this->actingAs($admin)
            ->visit('/product-phase/create')
            ->type('Dubbele Productfase', 'name')
            ->press('Productfase aanmaken')
            ->see('name is al in gebruik')
            ->seePageIs('/product-phase/create');
    }

    /**
     * Tests if an admin can change the name of a product phase.
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
            ->visit('/product-phase/' . $productphase->id . '/edit')
            ->see('Wijzig productfase')
            ->type('Nieuwe Naam', 'name')
            ->press('Productfase wijzigen')
            ->see('Productfase bijgewerkt!')
            ->seePageIs('/product-phase')
            ->seeInDatabase('productphases', ['id' => $productphase->id, 'name' => 'Nieuwe Naam'])
            ->dontSeeInDatabase('productphases', ['id' => $productphase->id, 'name' => 'Oude Naam']);
    }
}
