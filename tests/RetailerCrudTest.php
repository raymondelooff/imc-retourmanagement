<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RetailerCrudTest extends TestCase
{
    /**
     * Check if the index page is returned on visit
     *
     * @return void
     */
    public function testExample()
    {
        $this->visit('/retailer');
    }
}
