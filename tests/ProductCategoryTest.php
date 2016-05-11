<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;

/**
 * Class ProductCategoryTest
 * Test CRUD operations of productcategory
 * @author Lennart
 *
 * TODO: Add test to check if user is admin
 */
class ProductCategoryTest extends TestCase
{
    // Empty the test database before beginning tests
    use DatabaseMigrations;

    /**
     * Basic test to check if the content of the page is correct and in dutch
     *
     * @return void
     */
    public function testPageContent()
    {
        $this->visit('/productcategory')
            ->see('Product Categorie')
            ->dontsee('Product Categorie')
            ->see('Maak nieuwe Product Categorie')
            //Check content of create page
            ->click('Maak nieuwe Product Categorie')
            ->seePageIs('/productcategory/create')
            ->see('Maak nieuw Product Categorie')
            ->see('Categorie:')
            ->dontsee('Name:')
            ->see('Maak')
            ->dontsee('Make');
    }

    /**
     * Test creating a productcategory
     */
    public function testCreateProductCategory()
    {
        $this->visit('/productcategory')
            ->click('Maak nieuw Kwaliteitslabel')
            ->seePageIs('/productcategory/create')
            ->type('CreateTest', 'name')
            ->press('Maak')
            ->seePageIs('/productcategory')
            ->see('CreateTest')
            ->seeInDatabase('productcategory', ['id' => '1', 'name' => 'CreateTest'])
            ->click('Maak nieuw Kwaliteitslabel')
            ->type('CreateTest', 'name')
            ->press('Maak')
            ->seePageIs('/productcategory/create')
            ->notSeeInDatabase('productcategory', ['id' => '2', 'name' => 'CreateTest'])
            ->visit('/productcategory/create')
            ->type('CreateTest2', 'name')
            ->press('Maak')
            ->seePageIs('/productcategory')
            ->see('CreateTest2')
            ->seeInDatabase('productcategory', ['id' => '1', 'name' => 'CreateTest'])
            ->seeInDatabase('productcategory', ['id' => '2', 'name' => 'CreateTest2']);
    }

    /**
     * Test deleting a productcategory
     */
    public function testDeleteProductCategory()
    {
        $this->visit('/productcategory')
            ->click('Maak nieuw Kwaliteitslabel')
            ->seePageIs('/productcategory/create')
            ->type('DeleteTest', 'name')
            ->press('Maak')
            ->seePageIs('productcategory')
            ->click('Maak nieuw Kwaliteitslabel')
            ->seePageIs('/productcategory/create')
            ->type('DeleteTest2', 'name')
            ->press('Maak')
            ->seeInDatabase('productcategory', ['name' => 'DeleteTest'])
            ->seeInDatabase('productcategory', ['name' => 'DeleteTest2'])
            ->press('Verwijder')
            ->notSeeInDatabase('productcategory', ['name' => 'DeleteTest'])
            ->seeInDatabase('productcategory', ['name' => 'DeleteTest2']);
    }

    /**
     * Test editing a productcategory
     */
    public function testEditProductCategory()
    {
        $this->visit('/productcategory')
            ->click('Maak nieuw Kwaliteitslabel')
            ->seePageIs('/productcategory/create')
            ->type('EditTest', 'name')
            ->press('Maak')
            ->seePageIs('productcategory')
            ->seeInDatabase('productcategory', ['id'=>'1', 'name' => 'EditTest'])
            ->click('Bewerk')
            ->seePageIs('/productcategory/1/edit')
            ->seeInField('name', 'EditTest')
            ->clearInputs()
            ->type('UpdatedTest', 'name')
            ->press('Bewerk')
            ->seePageIs('/productcategory')
            ->see('UpdatedTest')
            ->notSeeInDatabase('productcategory', ['id'=>'1', 'name' => 'EditTest'])
            ->seeInDatabase('productcategory', ['id'=>'1', 'name' => 'UpdatedTest']);


    }

}
