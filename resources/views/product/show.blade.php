@extends('layouts.structure.index')

@section('content')
    <div class='container'>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Loja</a></li>
                <li class="breadcrumb-item"><a href="#">{{ $product->category->name }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $product->name }}</li>
            </ol>
        </nav>
        <div class="row text-center my-5">
            <div class="col-6">
                <img src="{{ asset($product->mainImage) }}" width="300px" />
            </div>
            <div class="col-6 text-center my-3">
                <h2 class="my-2">{{ $product->name }}</h2>
                <p class="my-2">{{ $product->description }}</p>
                <span class="h5 d-block my-2">R$: {{ $product->price }}</span>
                <button class="btn btn-primary my-2">Adicionar no carrinho</button>
                <div class="d-block my-2">
                    @foreach ($product->tags as $tag)
                        <a href="" class="btn btn-light btn-sm">{{ $tag->name }}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection