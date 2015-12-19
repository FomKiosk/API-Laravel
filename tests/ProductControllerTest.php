<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProductControllerTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * @group routes
     */
    public function testShouldReturnCategoriesWithProducts()
    {
        $this
            ->visit('api/v1/products')
            ->seeJson();
    }
}
