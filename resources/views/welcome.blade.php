@extends('layouts.header');

@section('css')
<style>
    #banner {
        background: url('https://via.placeholder.com/2000x800');
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
        min-height: 400px;
    }
</style>
@endsection

@section('content')

<section>
    <div class='row'>
        <div class='my-2 text-center'>
            <h2>Produtos em Promoção</h2>
            <span class='text-muted'>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolore, iure.</span>
        </div>
    </div>

    <div class='row'>
        @foreach (\App\Models\Product::promocoes() as $product)


        <div class='col-10 col-md-6 col-lg-4 mx-auto mt-3'>
            <div class='text-center'>
                <img src="{{ asset($product->image) }}" style='height: 200px;'>
            </div>
            <div class='text-center mt-3'>
                <span class='d-block'>{{ $product->name }}</span>
                <span class='text-decoration-line-through text-muted'>R$100,00</span>
                <span class=''>{{ $product->price }}</span>
                <div class='mt-3'>
                    <a href='#' class='btn btn-secondary'>Visualizar</a>
                    <a href='#' class='btn btn-primary'>Comprar</a>
                </div>
            </div>
        </div>

        @endforeach

    </div>
</section>

@endsection