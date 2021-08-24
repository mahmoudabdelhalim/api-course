<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends BaseController
{
    public function cart(){

        try
        {
            $user = Auth::user();
        $cartData=Cart::where('user_id',$user->id)->get();
            if($cartData){

                return $this->sendResponse($cartData, 'Geting Cart successfully.');
            }
            else
            {
                return $this->sendError('Invalid Cart !');
            }
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), 'Error happens!!');
        }
    }
}
