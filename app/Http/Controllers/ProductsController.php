<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\ProductRepository;

class ProductsController extends Controller
{
    /**
     * @var ProductRepository
     */
    protected $productRepository;

    /**
     * ProductsController constructor.
     * @param ProductRepository $productRepository
     */
    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * Retrieve all categories with their products
     * Products can have a category_id_sub : if it is not null, a category with sub_ids can be shown on screen
     *
     * @return mixed
     */
    public function index()
    {
        $products = $this->productRepository->getProductsOrderedByCategory();

        return response()->json($products, 200);
    }

}
