@extends('layouts.structure.index')

@section('content')

<section>
    <div class='row m-0'>
        <div class='my-2 text-center'>
            <h2>Lista de Pedidos</h2>
        </div>
    </div>

    <div class='row m-5'>
        <div class="accordion" id="accordionExample">
            @foreach(\App\Models\Order::where('user_id','=', Auth()->user()->id)->get() as $order)

            <div class="accordion-item">
                <div class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#item-{{ $order->id }}">
                        Pedido Nº {{ $order->id }} ({{ $order->status }}) - {{ $order->created_at->format('d-m-Y H:m') }}h
                    </button>
                </div>
                <div class="accordion-collapse collapse" id="item-{{ $order->id }}">
                    <div class="accordion-body">
                        <div>
                            <p>{{ $order->street }}, 
                            {{ $order->number }} -  
                            {{ $order->city }} -
                            {{ $order->state }}</p>
                            <p>Pago com o cartão: ####-####-####-{{ $order->cc_number }}</p>
                        </div>
                        <table class='table table-striped'>
                            <thead>
                                <tr>
                                    <th>Imagem</th>
                                    <th>Produto</th>
                                    <th>Cor</th>
                                    <th>Quantidade</th>
                                    <th>Preço Unitário</th>
                                    <th>Preço Total</th>
                                </tr>
                            </thead>
                        
                            <tbody>
                                @foreach($order->items() as $item)
                                <tr class="align-middle">
                                    <td><img src="{{ asset($item->product()->mainImage) }}" style="width: 50px"></td>
                                    <td><a href="{{ route('product.show', $item->product()->id) }}">{{ $item->product()->name }}</a>
                                    </td>
                                    <td>{{ $item->colortag()->name }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td><span> R$ {{ number_format($item->price, 2, ',', '.') }}</td>
                                    <td><span> R$ {{ number_format($item->price * $item->quantity, 2, ',', '.') }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            @endforeach
        </div>
    </div>

</section>

@endsection