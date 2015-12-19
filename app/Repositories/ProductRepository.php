<?php

namespace App\Repositories;

use App\Models\Category;
use App\Models\Product;

class ProductRepository
{
    /**
     * Return the categories with their products
     *
     * @return mixed
     */
    public function getProductsOrderedByCategory()
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
     * Update the visibility of a product
     *
     * @param $id
     * @param $visible
     * @return mixed
     */
    public function updateVisibility($id, $visible)
    {
        $product = Product::find($id);
        $product->visible = $visible;
        $product->save();
        return $product;
    }
}