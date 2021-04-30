@extends('layouts.structure.index')

@section('content')

<section>
    <div class='row mt-5 mx-0'>
        @foreach (\App\Models\Product::highlights() as $product)
        <div class='col-10 col-md-6 col-lg-4 mx-auto mt-3'>
            <div class='text-center'>
                <img src="{{ asset($product->mainImage) }}" style='height: 200px; width: 150px;'>
            </div>
            <div class='text-center mt-3'>
                <span class='d-block'>{{ $product->name }}</span>
                <span class='text-decoration-line-through text-muted'>R$100,00</span>
                <span class=''>{{ $product->price }}</span>
                <div class='mt-3'>
                    <a href='{{ route('product.show', $product->id) }}' class='btn btn-secondary'>Visualizar</a>
                    <a href='#' class='btn btn-primary'>Comprar</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

</section>

@endsection
