@extends('layouts.structure.index')

@section('content')

<section>
    <div class='row my-5'>
        <div class='my-2 text-center'>
            <h1>Carrinho de Compras</h1>
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
                    <td>
                        <a href="{{ route('product.show', $item->product()->id) }}" class="link-dark">
                            {{ $item->product()->name }}
                        </a>
                    </td>
                    <td>{{ $item->tag()->name }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td><span> R$ {{ number_format($item->product()->price, 2, ',', '.') }}</td>
                    <td><span> R$ {{ number_format($item->product()->price * $item->quantity, 2, ',', '.') }}</td>
                    <td>
                        <a href='{{ route('cart.remove', ['product'=>$item->product(), 'tag'=>$item->tag(), 'remove'=>true]) }}'
                            class='btn btn-sm btn-danger'
                        >
                            <i class="far fa-trash-alt"></i>
                        </a>
                        @if($item->quantity > $item->product()->minQuantity)
                        <a href='{{ route('cart.remove', ['product'=>$item->product(), 'tag'=>$item->tag()]) }}'
                            class='btn btn-sm btn-warning'
                        >
                            <i class="fas fa-minus text-white"></i>
                        </a>
                        @endif
                        <a 
                            href="{{ route('cart.add', ['product'=>$item->product(), 'tag'=>$item->tag()]) }}" 
                            class='btn btn-sm btn-success'
                        >
                            <i class="fas fa-plus"></i>
                        </a>
                    </td>
                </tr>

                @php
                $total += $item->product()->price * $item->quantity;
                @endphp
                @endforeach
            </tbody>
        </table>
        <div class='d-flex flex-column flex-wrap align-items-end'>
            <span class="h6">Total da Compra: </span>
            <span class='h4'>R$ {{ number_format($total, 2, ',', '.') }}</span>
            @if (!$cart->isEmpty())
                <a href="{{ route('cart.payment') }}" class="btn btn-orange btn-lg mt-3">Finalizar Compra</a>
            @endif
        </div>
    </div>

</section>

@endsection