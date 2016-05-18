<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProductsCrudTest extends TestCase
{
    /**
     * Tests if a logged in non-admin, non-retailer user can't visit the product index.
     *
     * @return void
     */
    public function testNonAdminNonRetailerCantSeeProductCrud()
    {
        $user = factory(App\User::class)->create();

        $this->actingAs($user)
            ->visit('/product')
            ->dontSee('Product')
            ->see('Welkom')
            ->seePageIs('/');
    }

    /**
     * Tests if a non-logged user can't visit the product index.
     *
     * @return void
     */
    public function testNonLoggedInUserCantSeeProductCrud()
    {

        $this->visit('/product')
            ->dontSee('Product')
            ->see('Inloggen')
            ->seePageIs('/login');
    }

    /**
     * Tests if a logged in admin user can visit the product index.
     *
     * @return void
     */
    public function testAdminCanSeeProductCrud()
    {
        $this->seed('TestingDatabaseSeeder');
        $admin = factory(App\User::class, 'admin')->create();

        $this->actingAs($admin)
            ->visit('/product')
            ->see('Product')
            ->seePageIs('/product');
    }

    /**
     * Tests if a logged in retailer user can visit the product index.
     *
     * @return void
     */
    public function testRetailerUserCanSeeProductCrud()
    {
        $this->seed('TestingDatabaseSeeder');
        $retailer = factory(App\User::class, 'retailer')->create();

        $this->actingAs($retailer)
            ->visit('/product')
            ->see('Product')
            ->seePageIs('/product');
    }

    /**
     * Tests if a logged in retailer user can only see his own products.
     *
     * @return void
     */
    public function testRetailerUserCanSeeOnlyOwnProducts()
    {
        $this->seed('TestingDatabaseSeeder');

        $product = factory(App\Product::class)->create();
        $otherRetailerUser = factory(App\User::class, 'retailer')->create();


        $response = $this->actingAs($otherRetailerUser)
            ->call('GET','/product/'. $product->id);

        $this->assertEquals(403, $response->status());
    }

    /**
     * Tests if the creation of a product works correctly.
     *
     * @return void
     */
    public function testProductCreation()
    {
        $this->seed('TestingDatabaseSeeder');
        $admin = factory(App\User::class, 'admin')->create();

        $this->actingAs($admin)
            ->visit('product/create')
            ->type('Test Retailer', 'name')
            ->press('Retailer aanmaken')
            ->see('Retailer aangemaakt!')
            ->seePageIs('/retailer')
            ->seeInDatabase('retailers', ['name' => 'Test Retailer']);
    }
}
