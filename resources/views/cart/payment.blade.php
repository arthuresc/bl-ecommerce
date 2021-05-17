@extends('layouts.structure.index')

@section('content')

<div class="row justify-content-center m-5">
    <h2>Pagamento</h2>

    <div class="col-md-6 col-10 my-4 p-3">
        <h3>Endereço de Entrega</h3>

        <address class="ms-4">
            @foreach (\App\Models\Address::addressGet() as $address)
                {{ $address->street }} ,
                {{ $address->number }} <br>
                {{ $address->cep }} <br>
                {{ $address->state }} <br>
                {{ $address->city }} <br>
                {{ $address->country }} <br>
            @endforeach
        </address>

        @php
            $addressCount = \App\Models\Address::where('user_id', '=', Auth()->user()->id)->count();
        @endphp

        @if ($addressCount)
            <button class="btn btn-sm bg-success text-white" type="button" data-bs-toggle="collapse" data-bs-target="#address-collapse" aria-expanded="false" aria-controls="address-collapse">
                Atualizar endereço
            </button>
        @else
            <button class="btn btn-sm bg-success text-white" type="button" data-bs-toggle="collapse" data-bs-target="#address-collapse" aria-expanded="false" aria-controls="address-collapse">
                Adicionar endereço
            </button>
        @endif

        <div class="collapse m-3" id="address-collapse">
            <form method="post" action="{{ route('address.store') }}" enctype="multipart/form-data">
                @CSRF

                <div class="row form-group mb-2">
                    <label class="form-label" for="street">Endereço</label>
                    <input type="text" name="street" id="street" placeholder="Ex: Av. Paulista" class="form-control" 
                        @if($addressCount) value="{{ \App\Models\Address::address()->street }}" @endif required>
                </div>

                <div class="row form-group mb-2">
                    <label class="form-label" for="number">Número</label>
                    <input type="text" name="number" id="number" placeholder="Ex: 77" class="form-control" 
                        @if($addressCount) value="{{ \App\Models\Address::address()->number }}" @endif required>
                </div>

                <div class="row form-group mb-2">
                    <label class="form-label" for="city">Cidade</label>
                    <input type="text" name="city" id="city" placeholder="Ex: São Paulo" class="form-control" 
                        @if($addressCount) value="{{ \App\Models\Address::address()->city }}" @endif required>
                </div>

                <div class="row form-group mb-2">
                    <label class="form-label" for="state">Estado</label>
                    <input type="text" name="state" id="state" placeholder="Ex: São Paulo" class="form-control" 
                        @if($addressCount) value="{{ \App\Models\Address::address()->state }}" @endif required>
                </div>

                <div class="row form-group mb-2">
                    <label class="form-label" for="cep">CEP</label>
                    <input type="text" name="cep" id="cep" placeholder="Ex: 77" class="form-control" pattern="[0-9]{5}-[\d]{3}" 
                        @if($addressCount) value="{{ \App\Models\Address::address()->cep }}" @endif required>
                </div>

                <div class="row form-group mb-2">
                    <label class="form-label" for="country">País</label>
                    <input type="text" name="country" id="country" placeholder="Ex: Brasil" class="form-control" 
                        @if($addressCount) value="{{ \App\Models\Address::address()->country }}" @endif required>
                </div>

                <button class="btn btn-sm bg-success text-white" style="margin: -10px">Salvar</button>
            </form>
        </div>
       
    </div>

    <div class="col-md-6 col-10 my-4 p-3 bg-light">
        <h3>Resumo da Compra</h3>
        <div class='ms-3'>
            <div>
                <span>Quantidade de produtos comprados</span>
                <a href="{{ route('cart.show') }}" class="float-end me-4">{{\App\Models\Cart::count()}} produto(s)</a>
            </div>

            <div>
                <span>Frete:</span>
                <span class="float-end me-4 text-success font-weight-bold">GRÁTIS</a>
            </div>
            <hr>
            <div>
                <span class='h4'>Total a pagar</span>
                <span class='float-end me-4 h4'>R$
                    {{ number_format(\App\Models\Cart::totalValue(), 2, ',', '.') }}</span></span>
            </div>
        </div>
    </div>


<hr>

<form class='my-2'>
    @csrf

    <div class='row justify-content-center mw-100'>
        <div class='col-10'>
            <h2>Dados de Pagamento</h2>
        </div>

        <div class="col-md-5 col-10">
            <label for='cc-nome'>Nome no cartão de crédito</label>
            <input type='text' id='cc-nome' name='cc-nome' class='form-control' required>
            <span class="text-muted">O nome deve ser igual o que está no cartão</span>
        </div>

        <div class="col-md-5 col-10">
            <label for='cc-card'>Número do Cartão</label>
            <input type='number' id='cc-card' name='cc-card' class='form-control' required>
        </div>

        <div class="col-md-5 col-10">
            <label for='cc-cvv'>Código CVV</label>
            <input type='number' id='cc-cvv' name='cc-cvv' class='form-control' required>
        </div>

        <div class="col-md-5 col-10">
            <label for='cc-date'>Data de expiração</label>
            <input type='date' id='cc-date' name='cc-date' class='form-control' required>
        </div>

        <button type='submit' class='btn btn-lg btn-success mt-3 w-25'>Efetuar Pagamento</button>
    </div>
        
</form>
</div>
@endsection