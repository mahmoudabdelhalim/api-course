<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends BaseController
{
    public function index(){
        $products = Product::all();
        return $this->sendResponse($products, 'All products Retrieved  Successfully');
    }
}
