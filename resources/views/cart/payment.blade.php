@extends('layouts.structure.index')

@section('content')

<div class="row justify-content-center my-5 mx-1">
    <h2>Pagamento</h2>

    <div class="col-md-6 col-12 mb-3 mt-4 p-3">
        <h3>Endereço de Entrega</h3>

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
            <button class="btn btn-md btn-orange m-3 text-white" type="button" data-bs-toggle="collapse" data-bs-target="#address-collapse" aria-expanded="false" aria-controls="address-collapse">
                Atualizar endereço
                <i class="fas fa-map-marker-alt ms-1"></i>
            </button>
        @else
            <button class="btn btn-md btn-orange m-3 text-white" type="button" data-bs-toggle="collapse" data-bs-target="#address-collapse" aria-expanded="false" aria-controls="address-collapse">
                Adicionar endereço
                <i class="fas fa-map-marker-alt ms-1"></i>
            </button>
        @endif

        <div class="collapse m-3" id="address-collapse">
            <form method="post" action="{{ route('address.store', ['origin'=>'payment']) }}" enctype="multipart/form-data" class="row">
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
                    <input type="text" name="cep" id="cep" placeholder="Ex: 77" class="form-control" pattern="[0-9]{5}-[\d]{3}" 
                        @if($addressCount) value="{{ \App\Models\Address::address()->cep }}" @endif required>
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

    <div class="col-md-6 col-10 my-4 p-3 bg-light text-center text-md-start">
        <h3 class="text-left">Resumo da Compra</h3>
        <div class='row ms-3'>
            <div class="col-12 mt-3 text-center text-md-left">
                <span class="float-start">Produtos comprados</span>
                <a href="{{ route('cart.show') }}" class="d-block float-md-end me-md-4">
                    {{\App\Models\Cart::count()}} produto(s)
                </a>
            </div>

            <div class="col-12 mt-3">
                <span class="float-start">Frete:</span>
                <span class="float-end me-md-4 text-success font-weight-bold">GRÁTIS</a>
            </div>
            <hr class="my-3">
            <div class="text-center text-md-start">
                <span class='h4'>Total a pagar</span>
                <span class='d-block float-md-end me-md-4 h4'>R$
                    {{ number_format(\App\Models\Cart::totalValue(), 2, ',', '.') }}</span></span>
            </div>
        </div>
    </div>


<hr>

<form class='my-2' method="post" action="{{ route('order.add') }}">
    @csrf

    <div class='row justify-content-center mw-100'>
        <div class='col-10 text-center mb-3'>
            <h2>Dados de Pagamento</h2>
        </div>

        <div class="col-md-4 col-12 m-1">
            <label for='cc-nome'>Nome no cartão de crédito</label>
            <div class="input-group">
                <input type='text' id='cc-nome' name='cc-nome' class='form-control' required>
                <div class="input-group-append">
                    <span class="input-group-text h-100" id="basic-addon2">
                        <i class="far fa-credit-card"></i>
                    </span>
                </div>
            </div>
            <span class="text-muted">O nome deve ser igual o que está no cartão</span>
        </div>

        <div class="col-md-4 col-12 m-1">
            <label for='cc_number'>Número do Cartão</label>
            <div class="input-group">
                <input type='number' id='cc_number' name='cc_number' class='form-control' required>
                <div class="input-group-append">
                    <span class="input-group-text h-100" id="basic-addon2">
                        <i class="far fa-credit-card"></i>
                    </span>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-10 m-1">
            <label for='cc-cvv'>Código CVV</label>
            <div class="input-group">
                <input type='number' id='cc-cvv' name='cc-cvv' class='form-control' required>
                <div class="input-group-append">
                    <span class="input-group-text h-100" id="basic-addon2">
                        <i class="far fa-credit-card"></i>
                    </span>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-10 m-1">
            <label for='cc-date'>Data de expiração</label>
            <input type='date' id='cc-date' name='cc-date' class='form-control' required>
        </div>

        <div class="col-12 mt-3 d-flex justify-content-center">
            <button type='submit' class='btn btn-lg btn-orange mt-3'>
                Efetuar Pagamento
                <i class="fas fa-cart-arrow-down"></i>
            </button>
        </div>
        
    </div>
        
</form>
</div>
@endsection