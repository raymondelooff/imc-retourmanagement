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
            ->call('GET', '/product/' . $product->id);

        $this->assertEquals(403, $response->status());
    }

    /**
     * Tests if the creation of a product works correctly as an admin.
     *
     * @return void
     */
    public function testProductCreationAsAdmin()
    {
        $this->seed('TestingDatabaseSeeder');
        $retailer = factory(App\Retailer::class)->create();
        $admin = factory(App\User::class, 'admin')->create();

        $this->actingAs($admin)
            ->visit('product/create')
            ->type('Test Product', 'name')
            ->select('1', 'retailer_id')
            ->press('Maak product aan')
            ->see('Product toegevoegd!')
            ->seePageIs('/product')
            ->seeInDatabase('products', ['name' => 'Test Product', 'retailer_id' => '1']);
    }

    /**
     * Tests if the creation of a product works correctly as a retailer.
     *
     * @return void
     */
    public function testProductCreationAsRetailer()
    {
        $this->seed('TestingDatabaseSeeder');
        $retailer = factory(App\User::class, 'retailer')->create();

        $this->actingAs($retailer)
            ->visit('product/create')
            ->type('Test Product', 'name')
            ->press('Maak product aan')
            ->see('Product toegevoegd!')
            ->seePageIs('/product')
            ->seeInDatabase('products', ['name' => 'Test Product', 'retailer_id' => '1']);
    }

    /**
     * Tests if changing a product works correctly as an admin.
     *
     * @return void
     */
    public function testChangeProductAsAdmin()
    {
        $this->seed('TestingDatabaseSeeder');
        $retailer = factory(App\User::class, 'retailer')->create();
        $product = factory(App\Product::class)->create([
            'name' => 'Oude Naam',
            'retailer_id' => $retailer->id
        ]);
        $admin = factory(App\User::class, 'admin')->create();

        $this->actingAs($admin)
            ->visit('/product/' . $product->id . '/edit')
            ->type('Nieuwe Naam', 'name')
            ->press('Pas product aan')
            ->see('Product gewijzigd!')
            ->seePageIs('/product/' . $product->id)
            ->seeInDatabase('products', ['id' => $product->id, 'name' => 'Nieuwe Naam', 'retailer_id' => $retailer->id])
            ->dontSeeInDatabase('products', ['id' => $product->id, 'name' => 'Oude Naam', 'retailer_id' => $retailer->id]);
    }

    /**
     * Tests if changing a product works correctly as a retailer.
     *
     * @return void
     */
    public function testChangeProductAsRetailer()
    {
        $this->seed('TestingDatabaseSeeder');
        $retailer = factory(App\User::class, 'retailer')->create();
        $product = factory(App\Product::class)->create([
            'name' => 'Oude Naam',
            'retailer_id' => $retailer->id
        ]);

        $this->actingAs($retailer)
            ->visit('/product/' . $product->id . '/edit')
            ->type('Nieuwe Naam', 'name')
            ->press('Pas product aan')
            ->see('Product gewijzigd!')
            ->seePageIs('/product/' . $product->id)
            ->seeInDatabase('products', ['id' => $product->id, 'name' => 'Nieuwe Naam', 'retailer_id' => $retailer->id])
            ->dontSeeInDatabase('products', ['id' => $product->id, 'name' => 'Oude Naam', 'retailer_id' => $retailer->id]);
    }

    /**
     * Tests if deleting a product works correctly as an admin.
     *
     * @return void
     */
    public function testDeleteProductAsAdmin()
    {
        $this->seed('TestingDatabaseSeeder');
        $retailer = factory(App\User::class, 'retailer')->create();
        $product = factory(App\Product::class)->create([
            'name' => 'Test Product',
            'retailer_id' => $retailer->id
        ]);
        $admin = factory(App\User::class, 'admin')->create();

        $this->actingAs($admin)
            ->visit('/product')
            ->see($product->name)
            ->press('Verwijder')
            ->see('Product verwijderd!')
            ->seePageIs('/product')
            ->dontSeeInDatabase('products', ['id' => $product->id, 'name' => $product->name]);
    }
}
