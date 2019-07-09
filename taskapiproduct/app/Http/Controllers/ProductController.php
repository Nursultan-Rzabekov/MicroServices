<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Product;
use App\Category;
use Response;
use App\Http\Resources\Product as ProductResource;
use App\Http\Resources\ProductCollection;
class ProductController extends Controller
{
    public function store(StoreProductRequest $request)
    {
        $product = Product::create($request->validated());
        //$category = Category::find([5,6]);
        $category = $request->category;
        $product->categories()->attach($category);
        return Response::json(['status' => "success"],200);
    }
    public function getAll(Request $request)
    {
    	$product = new ProductCollection(Product::paginate(2));
        return $product;
    }
    public function update(UpdateProductRequest $request,Product $productid)
    {
        $productid->name = $request->name;
        $productid->save();
        return $productid;
    }
    public function destroy(Product $productid)
    {
        $productid->delete();
        return $productid;
    }
    public function getbyId(Product $productid)
    {
        return $productid;
    }

    public function getProductsByCategoryId(Category $categoryid)
    {
        //dd($categoryid->products);
        return $categoryid->products;
    }
}
