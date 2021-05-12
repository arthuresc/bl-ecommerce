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
            ['colortag_id', '=', $request->tag],
            // SUBSTITUIR O 1 POR Auth()->user()->id
            ['user_id', '=', 1]
        ])->first();

        if($item) {
            $item->update([
                'quantity' => ($request->quantity) ? $item->quantity + $request->quantity : $item->quantity += 1
            ]);
            session()->flash('success', '1 unidade adicionada ao carrinho!');
            return redirect(route('cart.show'));
        } else {
            Cart::create([
                // SUBSTITUIR A LINHA ABAIXO POR POR Auth()->user()->id
                'user_id' => 1,
                'product_id' => $request->product,
                'colortag_id' => $request->tag,
                'quantity' => $request->quantity
            ]);
            session()->flash('success', 'Produto adicionado ao carrinho!');
            return redirect(route('cart.show'));
        }
    }

    public function remove(Product $product, Tag $tag = null) {

        $item = Cart::where([
            ['product_id', '=', $product->id],
            ['colortag_id', '=', $tag->id],
            ['user_id', '=', Auth()->user()->id]
        ])->first();

        if($item->quantity > 1) {
            $item->update([
                'quantity' => $item->quantity - 1
            ]);
            session()->flash('success', '1 unidade removida do carrinho!');
            return redirect(route('cart.show'));
        } else {
            $item->delete();
            session()->flash('success', 'Produto removido ao carrinho!');
            return redirect(route('cart.show'));
        }
    }

    public function show() {
        // SUBSTITUIR O 1 POR Auth()->user()->id
        $cart = Cart::where('user_id', '=', 1)->get();
        return view('cart.show')->with('cart', $cart);
    }
}
