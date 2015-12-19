<?php

namespace App\Http\Controllers;

use App\Category;
use Calie\Admin\Test;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProductsController extends Controller
{
    /**
     * Retrieve all categories with their products
     * Products can have a category_id_sub : if it is not null, a category with sub_ids can be shown on screen
     *
     * @return mixed
     */
    public function index()
    {
        return Category::with(['products' => function($q) {
            $q->select([
                'products.id',
                'category_id',
                'name',
                'price',
                'visible',
                'sort',
                'category_id_sub'
            ]);
            $q->orderBy('sort');
        }])->orderBy('sort')->get();
    }

    /**
     * This function is for test perposes only.
     * @return int
     */
    public function test()
    {
        $calie = new Test();
        for($i = 0; $i < 30000; $i++)
        {
            $calie->add();
        }

        return $calie->number;
    }
}
