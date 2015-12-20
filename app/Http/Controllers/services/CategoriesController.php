<?php

namespace App\Http\Controllers\Services;

use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{
    /**
     * @var CategoryRepository
     */
    protected $categoryRepository;

    /**
     * CategoriesController constructor.
     * @param CategoryRepository $categoryRepository
     */
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Update the visibility of a category
     *
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update($id, Request $request)
    {
        $category = $this->categoryRepository->updateVisibility($id, $request->get('visible'));
//        if($request->get('visible')) {
//            $category = $this->categoryRepository->updateVisibility($id, true);
//        } else {
//            $category = $this->categoryRepository->updateVisibility($id, false);
//        }

        return response()->json($category, 200);
    }
}
