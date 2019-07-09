<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Category;
use Response;
use App\Http\Resources\Category as CategoryResource;
use App\Http\Resources\CategoryCollection;

class CategoryController extends Controller
{
    public function store(StoreCategoryRequest $request)
    {
    	$category = new Category;
    	$category->create($request->validated());  
    	return Response::json(['status' => "success"],200); 
    }

    public function getAll(Request $request)
    {
    	$categories = Category::get();
        return $categories;
    }

    public function update(UpdateCategoryRequest $request,Category $categoryid)
    {
        $categoryid->name = $request->name;
        $categoryid->save();
        return $categoryid;
    }


    public function destroy(Category $categoryid)
    {
        $categoryid->delete();
        return $categoryid;
    }


    public function getbyId(Category $categoryid)
    {
        return new CategoryResource($categoryid);
    }
}
