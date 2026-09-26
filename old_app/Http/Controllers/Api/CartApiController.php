<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
class CartApiController extends Controller
{
    public function addToCart(Request $request)
    {
        $salesman = auth()->user();
        $cart_id = $request->cart_id;
        if($cart_id) {
            $cart = Cart::find($cart_id);
        }else {
            $cart = new Cart();
        }

        $cart->sales_man_id = $salesman->id;
        $cart->product_id = $request->product_id;
        $cart->qunitity_type = $request->qunitity_type;  // only supported two type parcel or bundle
        $cart->size_color_quntity_price = json_decode($request->size_color_quntity_price , true);
        $cart->save();

        return response()->json([
            'result' => true,
            'message' => 'Item added to cart successfully.'
        ]);
    }
}
