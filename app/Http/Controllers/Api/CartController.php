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
use App\Models\Suggestion;
use Validator;
use Carbon\Carbon;
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
                $device=Device::where('user_id',$user->id)->where('status',1)->first();
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
    public function allOrder(){
        $orders = Order::all();

        return $this->sendResponse( $orders, 'All products Retrieved  Successfully');
    }

    public function offNotify(){
        $user = Auth::user();
        $device=Device::where('user_id',$user->id)->first();
        try
        {

            if ($device) {
                $device->update(['status' =>0]);
                return $this->sendResponse(null, 'notification Off');
            } else {
                return $this->sendError('U not have notification  !');
            }

        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), 'Error happens!!');
        }
    }

    public function onNotify(){
        $user = Auth::user();
        $device=Device::where('user_id',$user->id)->first();
        try
        {

            if ($device) {
                $device->update(['status' =>1]);
                return $this->sendResponse(null, 'notification On');
            } else {
                return $this->sendError('U not have notification  !');
            }

        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), 'Error happens!!');
        }
    }

    public function suggest(Request $request){
        $userid = Auth::user()->id;
        $input = array(
            'text' => 'required',
            'suggest_date' => 'required',

        );
        $validator = Validator::make($input);
        if ($validator->fails()) {
            return $this->convertErrorsToString($validator->messages());
        } else {
            try {
                $data=[
                    'text'=> $request->text,
                    'user_id'=>$userid,
                    'suggest_date'=> Carbon::parse($request->input('suggest_date')),
                ];
                Suggestion::create($data);
                return $this->sendResponse(null, 'U make Suggest successfully.');

            }catch (\Exception $ex){
                return $this->sendError($ex->getMessage(), 'Error happens!!');
            }
        }
    }
}
