<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;
use App\Models\Address;

class OrderController extends Controller
{
    public function add(Request $request) {

        $cart = Cart::where('user_id', '=', Auth()->user()->id)->get();
        $address = Address::address();

        $order = Order::create([
            'user_id' => Auth()->user()->id,
            'status' => "Processando",
            'cc_number' => substr($request->cc_number, -4),
            'street' => $address->street,
            'number' => $address->number,
            'city' => $address->city,
            'state' => $address->state,
            'cep' => $address->cep,
            'country' => $address->country,
        ]);

        foreach ($cart as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'colortag_id' => $item->colortag_id,
                'quantity' => $item->quantity,
                'price' => $item->product()->price,
            ]);

            $product = Product::where('id', '=', $item->product_id)->first();
            $product->update([
                'quantity' => $product->quantity - $item->quantity,
            ]);

            $item->delete();
        }

        return redirect(route('order.show'));
    }

    public function show() {
        return view('order.show');
    }
}
