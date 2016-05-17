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
    // Empty the test database before beginning tests
    use DatabaseMigrations;

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
            ->dontsee('Product Categorie')
            ->see('Maak nieuwe productcategorie')
            //Check content of create page
            ->click('Maak nieuwe productcategorie')
            ->seePageIs('/product-category/create')
            ->see('Productcategorie toevoege')
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
            ->seeInDatabase('productcategories', ['id' => '1', 'category' => 'CreateTest', 'productstatus' => 'CreateStatus', 'productorigin' => 'CreateOrigin'])
            ->click('Maak nieuwe productcategorie')
            ->type('CreateTest', 'category')
            ->type('CreateStatus', 'productstatus')
            ->type('CreateOrigin', 'productorigin')
            ->press('Productcategorie aanmaken')
            ->seePageIs('/product-category')
            ->notSeeInDatabase('productcategories', ['id' => '2', 'category' => 'CreateTest'])
            ->visit('/product-category/create')
            ->type('CreateTest2', 'category')
            ->type('CreateStatus2', 'productstatus')
            ->type('CreateOrigin2', 'productorigin')
            ->press('Productcategorie aanmaken')
            ->seePageIs('/product-category')
            ->see('CreateTest2')
            ->seeInDatabase('productcategories', ['id' => '1', 'category' => 'CreateTest', 'productstatus' => 'CreateStatus', 'productorigin' => 'CreateOrigin'])
            ->seeInDatabase('productcategories', ['id' => '2', 'category' => 'CreateTest2', 'productstatus' => 'CreateStatus2', 'productorigin' => 'CreateOrigin2']);
    }

    /**
     * Test deleting a product category
     */
    public function testDeleteProductCategory()
    {
        $this->seed('TestingDatabaseSeeder');
        $admin = factory(App\User::class, 'admin')->create();

        $this->actingAs($admin)
            ->visit('/product-category')
            ->click('Maak nieuwe productcategorie')
            ->seePageIs('/product-category/create')
            ->type('DeleteTest', 'category')
            ->type('DeleteStatus', 'productstatus')
            ->type('DeleteOrigin', 'productorigin')
            ->press('Productcategorie aanmaken')
            ->seePageIs('product-category')
            ->click('Maak nieuwe productcategorie')
            ->seePageIs('/product-category/create')
            ->type('DeleteTest2', 'category')
            ->type('DeleteStatus2', 'productstatus')
            ->type('DeleteOrigin2', 'productorigin')
            ->press('Productcategorie aanmaken')
            ->seeInDatabase('productcategories', ['id' => '1', 'category' => 'DeleteTest', 'productstatus' => 'DeleteStatus', 'productorigin' => 'DeleteOrigin'])
            ->seeInDatabase('productcategories', ['id' => '2', 'category' => 'DeleteTest2', 'productstatus' => 'DeleteStatus2', 'productorigin' => 'DeleteOrigin2'])
            ->press('Verwijder')
            ->notSeeInDatabase('productcategories', ['category' => 'DeleteTest'])
            ->seeInDatabase('productcategories', ['category' => 'DeleteTest2']);
    }

    /**
     * Test editing a productcategory
     */
    public function testEditProductCategory()
    {
        $this->seed('TestingDatabaseSeeder');
        $admin = factory(App\User::class, 'admin')->create();

        $this->actingAs($admin)
            ->visit('/product-category')
            ->click('Maak nieuwe productcategorie')
            ->seePageIs('/product-category/create')
            ->type('EditTest', 'category')
            ->type('EditStatus', 'productstatus')
            ->type('EditOrigin', 'productorigin')
            ->press('Productcategorie aanmaken')
            ->seePageIs('product-category')
            ->seeInDatabase('productcategories', ['id'=>'1', 'category' => 'EditTest'])
            ->click('Bewerk')
            ->seePageIs('/product-category/1/edit')
            ->seeInField('category', 'EditTest')
            ->clearInputs()
            ->type('UpdatedTest', 'category')
            ->press('Productcategorie bewerken')
            ->seePageIs('/product-category')
            ->see('UpdatedTest')
            ->notSeeInDatabase('productcategories', ['id'=>'1', 'category' => 'EditTest'])
            ->seeInDatabase('productcategories', ['id'=>'1', 'category' => 'UpdatedTest']);


    }

}
