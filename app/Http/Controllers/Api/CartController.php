<?php

namespace App\Http\Controllers\Api;

use App\Device;
use App\Http\Controllers\Api\BaseController;
use App\Http\Resources\CartResource;
use App\Models\Cart;
use App\Models\Cart_items;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Promo;
use App\FCMHelper as FCMHelper;
use Validator;

class CartController extends BaseController
{


    //cart where status =0
    public function cart()
    {

        try
        {
            $user = Auth::user();
            $cartData = Cart::where('user_id', $user->id)->where('status', "=", 0)->get();
            if ($cartData) {

                return $this->sendResponse(CartResource::collection($cartData), 'Geting Cart successfully.');
            } else {
                return $this->sendError('Invalid Cart !');
            }
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), 'Error happens!!');
        }
    }
    public function storeCart(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'product_id' => 'required',

        ]);

        if ($validator->fails()) {
            return $this->convertErrorsToString($validator->messages());
        }

        try
        {
            $user = Auth::user();
            if ($user) {
                $data = [
                    'user_id' => $user->id,

                    'product_id' => $request->product_id,
                    'quantity' => 1,

                    'status' => 0,
                ];

                $cart = Cart::create($data);

                return $this->sendResponse($cart, 'Product Add To Card');
            } else {
                return $this->sendError('You must login before !');
            }

        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), 'Error happens!!');
        }
    }

    public function AddQuantity($id)
    {
        $row = Cart::where('id', $id)->first();
        $row->update(['quantity' => $row->quantity + 1]);
        return $this->sendResponse($row, ' Cart updated successfully.');
    }

    public function SubstractQuantity($id)
    {

        $row = Cart::where('id', $id)->first();
        $row->update(['quantity' => $row->quantity - 1]);
        return $this->sendResponse($row, ' Cart updated successfully.');
    }

    public function checkout()
    {
        try
        {
            $user = Auth::user();
            $cartData = Cart::where('user_id', $user->id)->where('status', "=", 0)->get();
            if ($cartData) {
                $ItemsArray =[];
                foreach ($cartData as $cart) {

                    $data = [
                        'cart_id' => $cart->id,
                        'product_id' => $cart->product_id,
                        'price' => $cart->quantity * $cart->product->price,

                    ];

                    $cartItem = Cart_items::create($data);
                    array_push($ItemsArray,$cart->product);
                    //update cart
                    $cart->update(['status' => 1]);
                }

                $returnData=[
                    'user'=> $user,
                    'items'=>$ItemsArray,
                ];

                return $this->sendResponse($returnData, 'Geting Cart successfully.');
            } else {
                return $this->sendError('Invalid Cart !');
            }
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), 'Error happens!!');
        }
    }

    public function order(Request $request){


        try
        {
            $promo = Promo::where('promo_key','=',$request->promo)->first();



            $user = Auth::user();
            $cartData = Cart::where('user_id', $user->id)->where('status', "=", 1)->first();
            if ($cartData) {
                $max =Order::orderby('id','desc')->first();

     $max = ($max != null) ? intval($max['order_no']) : 0;
     $max++;

$sumPrice=Cart_items::where('cart_id', $cartData->id)->sum('price');

                $returnData=[
                    'order_no'=>$max,
                    'user_id'=> $user->id,
                    'total'=>$sumPrice,

                ];
                $order = Order::create($returnData);
                // if ($promo && $promo->status==1) {
                //     $order->copoun=$request->promo;
                //     $order->total=$sumPrice* $promo->value;
                    $order->save();
                // }
                //send notify
                $device=Device::where('user_id',$user->id)->first();
                FCMHelper::setNotificationParams('welcome','your order placed');
                FCMHelper::sendNotifcationToDevice($device->token);
                //end
                return $this->sendResponse($order, 'Geting Order successfully.');
         } else {
                 return $this->sendError('Invalid Order !');
             }
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), 'Error happens!!');
        }
    }

    public function promo(Request $request){
        $validator = Validator::make($request->all(), [
            'promo' => 'required',

        ]);

        if ($validator->fails()) {
            return $this->convertErrorsToString($validator->messages());
        }

        try
        {
            $promo = Promo::where('promo_key','=',$request->promo)->first();
            if ($promo && $promo->status==1) {

                return $this->sendResponse($promo, 'adding promo code to order');
            } else {
                return $this->sendError('promo not added !');
            }

        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), 'Error happens!!');
        }
    }
}
