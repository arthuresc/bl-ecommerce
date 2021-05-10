@extends('layouts.structure.index')

@section('content')

<section>
    <div class='row m-0'>
        <div class='my-2 text-center'>
            <h2>{{ $category->name }}</h2>
        </div>
    </div>

    <div class='row m-0'>
        @foreach ($category->products()->paginate(9) as $product)

        <div class='col-10 col-md-6 col-lg-4 mx-auto mt-3'>
            <div class='text-center'>
                <img src="{{ asset($product->mainImage) }}" style='height: 200px; width: 150px;'>
            </div>
            <div class='text-center mt-3'>
                <span class='d-block'>{{ $product->name }}</span>
                <span class='text-decoration-line-through text-muted'>R$100,00</span>
                <span class=''>{{ $product->price }}</span>
                <div class='mt-3'>
                    <a href='{{ route('product.show', $product->id) }}' class='btn btn-success'>Comprar</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class='d-flex justify-content-center mt-5'>
        {{ $products->links() }}
    </div>
</section>

@endsection