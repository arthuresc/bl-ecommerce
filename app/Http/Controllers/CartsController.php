<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Tag;

class CartsController extends Controller
{
    public function add(Request $request) {

        $item = Cart::where([
            ['product_id', '=', $request->product],
            ['colortag_id', '=', ($request->tag) ? $request->tag : 1],
            ['user_id', '=', Auth()->user()->id]
        ])->first();

        if($item) {
            $item->update([
                'quantity' => ($request->quantity) ? $item->quantity + $request->quantity : $item->quantity += 1
            ]);
            session()->flash('success', '1 unidade adicionada ao carrinho!');
            return redirect(route('cart.show'));
        } else {
            Cart::create([
                'user_id' => Auth()->user()->id,
                'product_id' => $request->product,
                'colortag_id' => ($request->tag) ? $request->tag : 1,
                'quantity' => $request->quantity
            ]);
            session()->flash('success', 'Produto adicionado ao carrinho!');
            return redirect(route('cart.show'));
        }
    }

    public function remove(Request $request) {

        $item = Cart::where([
            ['product_id', '=', $request->product],
            ['colortag_id', '=', $request->tag],
            ['user_id', '=', Auth()->user()->id]
        ])->first();

        if($item->quantity > 1) {
            $item->update([
                'quantity' => ($request->remove) ? $item->delete() : $item->quantity -= 1
            ]);
            session()->flash('success', ($request->remove) ? 'Produto removido ao carrinho!' : '1 unidade removida do carrinho!');
            return redirect(route('cart.show'));
        } else {
            $item->delete();
            session()->flash('success', 'Produto removido ao carrinho!');
            return redirect(route('cart.show'));
        }
    }

    public function show() {
        $cart = Cart::where('user_id', '=', Auth()->user()->id)->get();
        return view('cart.show')->with('cart', $cart);
    }

    public function payment() {
        $cart = Cart::where('user_id', '=', Auth()->user()->id)->get();
        return view('cart.payment')->with('cart', $cart);
    }
}
