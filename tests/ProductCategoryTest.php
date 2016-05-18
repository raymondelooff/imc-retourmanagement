<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;

/**
 * Class ProductCategoryTest
 * Test CRUD operations of productcategory
 * @author Lennart
 *
 */
class ProductCategoryTest extends TestCase
{
    /**
     * Tests if a logged in user can't visit the retailer index.
     *
     * @return void
     */
    public function testUserCantAccessProductCategoryIndex()
    {
        $user = factory(App\User::class)->create();

        $this->actingAs($user)
            ->visit('/product-category')
            ->see('Welkom')
            ->seePageIs('/');
    }

    /**
     * Basic test to check if the content of the page is correct and in dutch
     *
     * @return void
     */
    public function testPageContent()
    {
        $this->seed('TestingDatabaseSeeder');
        $admin = factory(App\User::class, 'admin')->create();

        $this->actingAs($admin)
            ->visit('/product-category')
            ->see('Productcategorieën')
            ->see('Maak nieuwe productcategorie')
            ->click('Maak nieuwe productcategorie')
            ->seePageIs('/product-category/create')
            ->see('Productcategorie toevoegen')
            ->see('Categorie')
            ->see('Productcategorie aanmaken');
    }

    /**
     * Test creating a product category
     */
    public function testCreateProductCategory()
    {
        $this->seed('TestingDatabaseSeeder');
        $admin = factory(App\User::class, 'admin')->create();

        $this->actingAs($admin)
            ->visit('/product-category')
            ->click('Maak nieuwe productcategorie')
            ->seePageIs('/product-category/create')
            ->type('CreateTest', 'category')
            ->type('CreateStatus', 'productstatus')
            ->type('CreateOrigin', 'productorigin')
            ->press('Productcategorie aanmaken')
            ->seePageIs('/product-category')
            ->see('CreateTest')
            ->seeInDatabase('productcategories', ['id' => '1', 'category' => 'CreateTest', 'productstatus' => 'CreateStatus', 'productorigin' => 'CreateOrigin']);
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
        $product_category = factory(App\ProductCategory::class)->create([
            'category' => 'Dubbele Categorie'
        ]);

        $this->actingAs($admin)
            ->visit('/product-category/create')
            ->type('Dubbele Categorie', 'category')
            ->type('Dubbele Categorie Beschrijving', 'productstatus')
            ->press('Productcategorie aanmaken')
            ->see('category is al in gebruik');
    }

    /**
     * Test editing a productcategory
     */
    public function testEditProductCategory()
    {
        $this->seed('TestingDatabaseSeeder');
        $admin = factory(App\User::class, 'admin')->create();
        $product_category = factory(App\ProductCategory::class)->create([
            'category' => 'Oude Naam'
        ]);

        $this->actingAs($admin)
            ->visit('/product-category/' . $product_category->id . '/edit')
            ->see('Productcategorie bewerken')
            ->type('Nieuwe Naam', 'category')
            ->type('Productstatus', 'productstatus')
            ->press('Productcategorie bewerken')
            ->see('Productcategorie bijgewerkt')
            ->seePageIs('/product-category/' . $product_category->id)
            ->seeInDatabase('productcategories', ['id' => $product_category->id, 'category' => 'Nieuwe Naam'])
            ->dontSeeInDatabase('productcategories', ['id' => $product_category->id, 'category' => 'Oude Naam']);
    }

}
