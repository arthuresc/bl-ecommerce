@extends('layouts.structure.index')

@section('content')

<section>
    <div class='row m-0'>
        <div class='my-2 text-center'>
            <h2>Carrinho de Compras</h2>
        </div>
    </div>

    <div class='row m-5'>
        <table class='table table-striped'>
            <thead>
                <tr>
                    <th>Imagem</th>
                    <th>Produto</th>
                    <th>Cor</th>
                    <th>Quantidade</th>
                    <th>Preço Unitário</th>
                    <th>Preço Total</th>
                    <th>Gerenciar</th>
                </tr>
            </thead>

            <tbody>
                @php
                $total = 0;
                @endphp
                @foreach($cart as $item)
                <tr class="align-middle">
                    <td><img src="{{ asset($item->product()->mainImage) }}" style="width: 50px"></td>
                    <td><a href="{{ route('product.show', $item->product()->id) }}">{{ $item->product()->name }}</a>
                    </td>
                    <td>{{ $item->tag()->name }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td><span> R$ {{ number_format($item->product()->price, 2, ',', '.') }}</td>
                    <td><span> R$ {{ number_format($item->product()->price * $item->quantity, 2, ',', '.') }}</td>
                    <td>
                        <a href='{{ route('cart.remove', ['product'=>$item->product(), 'tag'=>$item->tag(), 'remove'=>true]) }}'
                            class='btn btn-sm btn-danger'>Remover</a>
                        <a href='{{ route('cart.remove', ['product'=>$item->product(), 'tag'=>$item->tag()]) }}'
                            class='btn btn-sm btn-warning'
                        >-</a>
                        <a 
                            href="{{ route('cart.add', ['product'=>$item->product(), 'tag'=>$item->tag()]) }}" 
                            class='btn btn-sm btn-success'
                        >+</a>
                    </td>
                </tr>

                @php
                $total += $item->product()->price * $item->quantity;
                @endphp
                @endforeach
            </tbody>
        </table>
        <div class='d-flex flex-column flex-wrap align-items-end'>
            <span class='h4'>Total da Compra: R$ {{ number_format($total, 2, ',', '.') }}</span>
            <a href="{{ route('cart.payment') }}" class="btn btn-primary btn-lg mt-3">Finalizar Compra</a>
        </div>
    </div>

</section>

@endsection