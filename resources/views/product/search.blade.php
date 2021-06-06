@extends('layouts.structure.index')

@section('content')

<section>
    <div class='row m-0 mt-4'>
        <div class='my-2 text-center'>
            <h2 class="display-5">Resultados para: {{ $search }}</h2>
        </div>
    </div>

    <div class='row m-0 justify-content-center'>
        @if ($products->count() > 0)
            @foreach ($products as $product)
            <div class="flip-card col-10 col-md-6 col-lg-2 mx-5 mt-5">
                <div class="flip-card-inner shadow bg-white">
                    <div class="flip-card-front">
                        <div class='text-center'>
                            <img src="{{ asset($product->mainImage) }}" style='height: 200px; width: 100%;'>
                        </div>

                        <div class='text-center mt-3 py-2'>
                            <span class='d-block product-title display-6 px-2'>{{ $product->name }}</span>
                            <span class='product-price d-block mt-2'>R$
                                {{ number_format($product->price, 2, ',', '.') }}</span>
                        </div>
                    </div>
                    <a href='{{ route('product.show', $product->id) }}' class="link-dark">
                        <div class="flip-card-back">
                            <div class="mt-4">
                                <p class="text-muted px-2">{{ $product->description }}</p>
                                <div class='mt-2'>
                                    <span class="display-6">Comprar</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
        @else
            <span class="text-center text-muted my-5">Não foram encontrados resultados</span>
        @endif
    </div>

    <div class='d-flex justify-content-center mt-5 pt-5'>
        {{ $products->withQueryString()->links() }}
    </div>
</section>

@endsection