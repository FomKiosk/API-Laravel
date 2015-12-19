<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository
{
    /**
     * Update the visibility of a category
     *
     * @param $id
     * @param $visible
     * @return mixed
     */
    public function updateVisibility($id, $visible)
    {
        $category = Category::find($id);
        $category->visible = $visible;
        $category->save();
        return $category;
    }
}