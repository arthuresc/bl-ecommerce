<?php

namespace App\Http\Controllers;
use App\Models\Cart;
use App\Models\Address;

use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $item = Address::address();

        //dd($item);

        if($item) {
            $item->update([
                'user_id' => Auth()->user()->id,
                'street' => $request->street,
                'number' => $request->number,
                'city' => $request->city,
                'state' => $request->state,
                'cep' => $request->cep,
                'country' => $request->country
            ]);
            session()->flash('success', 'Endereço atualizado!');
            return view('cart.payment');
        } else {
            Address::create([
                'user_id' => Auth()->user()->id,
                'street' => $request->street,
                'number' => $request->number,
                'city' => $request->city,
                'state' => $request->state,
                'cep' => $request->cep,
                'country' => $request->country
            ]);
            session()->flash('success', 'Endereço adicionado com sucesso!');
            return view('cart.payment');
        }
    }

    public function show() {
        $address = Address::where('user_id', '=', Auth()->user()->id)->get();
        return view('cart.payment')->with('address', $address);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
