<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends BaseController
{
    public function index(){
        $products = Product::all();
        return $this->sendResponse($products, 'All products Retrieved  Successfully');
    }

//GET ALL CATEGORIES
    public function categories(){
        $categories = Category::whereNull('parent_category_id')->get();
        return $this->sendResponse($categories, 'All categories Retrieved  Successfully');
    }
    //GET LATEST PRODUCT
//GET SUB CATEGORY
public function subCategories(){
    $subCategories = Category::whereNotNull('parent_category_id')->get();
    return $this->sendResponse($subCategories, 'All Sub categories Retrieved  Successfully');
}

//SEARCH
public function search(Request $request){
    if($request->get('search-name')) {
        $search = $request->get('search-name');

        $products=Product::where('name','LIKE',"%$search%")->orWhere('description','LIKE',"%$search%")
        ->orwhereHas('category', function ($query) use ($search){
            $query->where('name','LIKE',"%$search%")->orWhere('description','LIKE',"%$search%");
        })->get();
        return $this->sendResponse($products, 'All Search result Retrieved  Successfully');
    }else{
        return $this->sendError('Error', 'Enter Search name !!');
    }
}


public function single_product($id){


    try
    {
        $product=Product::where('id','=',$id)->first();
        if($product){

            return $this->sendResponse($product, 'Geting Product successfully.');
        }
        else
        {
            return $this->sendError('Invalid Product !');
        }
    } catch (\Exception $e) {
        return $this->sendError($e->getMessage(), 'Error happens!!');
    }
}


}
