@extends('layouts.structure.index')

@section('content')

<section>
    <div class="row ps-5">

        <div class="col-12 col-md-6">
            <div class='my-4 ms-4'>
                <h1>Gerenciar Conta</h1>
            </div>

            <div class="ms-4 mb-4">
                <span>{{ Auth()->user()->name }}</span>
                <span class="d-block">{{ Auth()->user()->email }}</span>
            </div>

            <h3 class="ms-4">Endereço</h3>
    
            <address class="ms-4">
                @foreach (\App\Models\Address::addressGet() as $address)
                {{ $address->street }} ,
                {{ $address->number }} <br>
                CEP: {{ $address->cep }} <br>
                {{ $address->city }}, {{ $address->state }} <br>
                {{ $address->country }} <br>
                @endforeach
            </address>
        
            @php
                $addressCount = \App\Models\Address::where('user_id', '=', Auth()->user()->id)->count();
            @endphp
        
            @if ($addressCount)
                <button class="btn btn-md btn-orange m-3 text-white" type="button" data-bs-toggle="collapse"
                    data-bs-target="#address-collapse" aria-expanded="false" aria-controls="address-collapse">
                    Atualizar endereço
                    <i class="fas fa-map-marker-alt ms-1"></i>
                </button>
            @else
                <button class="btn btn-md btn-orange m-3 text-white" type="button" data-bs-toggle="collapse"
                    data-bs-target="#address-collapse" aria-expanded="false" aria-controls="address-collapse">
                    Adicionar endereço
                    <i class="fas fa-map-marker-alt ms-1"></i>
                </button>
            @endif
    
            <div class="collapse m-3" id="address-collapse">
                <form method="post" action="{{ route('address.store', ['origin'=>'order']) }}" enctype="multipart/form-data" class="row">
                    @CSRF
        
                    <div class="col-12 col-md-8 form-group mb-2">
                        <label class="form-label" for="street">Endereço</label>
                        <input type="text" name="street" id="street" placeholder="Ex: Av. Paulista" class="form-control"
                            @if($addressCount) value="{{ \App\Models\Address::address()->street }}" @endif required>
                    </div>
        
                    <div class="col-12 col-md-4 form-group mb-2">
                        <label class="form-label" for="number">Número</label>
                        <input type="text" name="number" id="number" placeholder="Ex: 77" class="form-control"
                            @if($addressCount) value="{{ \App\Models\Address::address()->number }}" @endif required>
                    </div>
        
                    <div class="col-12 col-md-8 form-group mb-2">
                        <label class="form-label" for="city">Cidade</label>
                        <input type="text" name="city" id="city" placeholder="Ex: São Paulo" class="form-control"
                            @if($addressCount) value="{{ \App\Models\Address::address()->city }}" @endif required>
                    </div>
        
                    <div class="col-12 col-md-4 form-group mb-2">
                        <label class="form-label" for="state">Estado</label>
                        <input type="text" name="state" id="state" placeholder="Ex: São Paulo" class="form-control"
                            @if($addressCount) value="{{ \App\Models\Address::address()->state }}" @endif required>
                    </div>
        
                    <div class="col-12 col-md-6 form-group mb-2">
                        <label class="form-label" for="cep">CEP</label>
                        <input type="text" name="cep" id="cep" placeholder="Ex: 77" class="form-control"
                            pattern="[0-9]{5}-[\d]{3}" @if($addressCount) value="{{ \App\Models\Address::address()->cep }}"
                            @endif required>
                    </div>
        
                    <div class="col-12 col-md-6 form-group mb-2">
                        <label class="form-label" for="country">País</label>
                        <input type="text" name="country" id="country" placeholder="Ex: Brasil" class="form-control"
                            @if($addressCount) value="{{ \App\Models\Address::address()->country }}" @endif required>
                    </div>
        
                    <div class="col-12 form-group m-2">
                        <button class="btn btn-md btn-orange text-white" style="margin: -10px">
                            Salvar
                            <i class="fas fa-save ms-1"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>


        <div class='col-12 col-md-6'>
            <div class='my-4 text-center'>
                <h1>Histórico de Pedidos</h1>
            </div>

            <div class="accordion" id="accordionExample">
                @foreach(\App\Models\Order::where('user_id','=', Auth()->user()->id)->get() as $order)

                <div class="accordion-item">
                    <div class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#item-{{ $order->id }}">
                            <span>
                                Pedido Nº 000{{ $order->id }} ({{ $order->status }}) - 
                                Realizado em:
                            </span>
                            <span class="ms-2 fst-italic">
                                {{ $order->created_at->format('d-m-Y H:m') }}h
                            </span>
                        </button>
                    </div>
                    <div class="accordion-collapse collapse" id="item-{{ $order->id }}">
                        <div class="accordion-body">
                            <div>
                                <span class="h6">Endereço</span>
                                <p>{{ $order->street }},
                                    {{ $order->number }} <br> 
                                    {{ $order->city }}, {{ $order->state }}
                                </p>
                                <span class="h6">Pagamento</span>
                                <p>####-####-####-{{ $order->cc_number }}</p>
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
                                        <td><a href="{{ route('product.show', $item->product()->id) }}" class="link-dark">{{ $item->product()->name }}</a>
                                        </td>
                                        @if($item->colortag())
                                            <td>{{ $item->colortag()->name }}</td>
                                        @else
                                            <td>-</td>
                                        @endif
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
    </div>

</section>

@endsection