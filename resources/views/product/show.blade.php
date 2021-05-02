@extends('layouts.structure.index')

@section('css-scoped')
    <style>
        .breadcrumbLink {
            text-decoration: none;
            color: #0e0e0e;
        }
        .colorButton {
            width: 35px;
            height: 35px;
            border-radius: 5px;
        }
        .minQuantity {
            width: 70px;
            margin-right: 10px;
        }
        .buyButton {
            color: #fff;
            background-color: #F39322;
        }
        .arrayImagesBox {
            height: 90px;
            width: 100%;
            background-repeat: no-repeat;
            background-position: center;
            background-size: 100%;
            padding: 3px;
        }
        #Azul {
            background-color: #2E86C1;
        }
        #Amarelo {
            background-color: #DFFF00;
        }
        #Vermelho {
            background-color: #C0392B;
        }
        #Verde {
            background-color: #27AE60;
        }
        #Roxo {
            background-color: #8E44AD;
        }
    </style>
@endsection

@section('content')
    <div class='container'>
        <div class="row my-5 justify-content-center">
            <div class="col-5 my-3 d-flex justify-content-center">
                <div class="col-2 flex-directoin-column">
                    @foreach (array_slice(json_decode($product->arrayImages), 0, 5) as $image) 
                        <img src="{{ asset($image) }}" class="arrayImagesBox"/>
                    @endforeach
                </div>
                <div class="col-10">
                    <img src="{{ asset($product->mainImage) }}" height="450px"/>
                </div>
            </div>
            <div class="col-5 my-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="breadcrumbLink" href="{{ url('/') }}">Loja</a></li>
                        <li class="breadcrumb-item"><a class="breadcrumbLink" href="{{ route('category.show', $product->category) }}">{{ $product->category->name }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $product->name }}</li>
                    </ol>
                </nav>
                <h2 class="my-2">{{ $product->name }}</h2>
                <span class="h5 my-4">R$: {{ $product->price }}</span>
                <p class="my-4">{{ $product->description }}</p>
                <h3 class="my-2 h6">Cores:</h3>
                <div class="d-block my-2">
                    @foreach ($colorTags as $tag)
                        <a href="{{ route('tag.show', $tag->id) }}" id="{{$tag->name}}" class="btn colorButton"></a>
                    @endforeach
                </div>
                <div class="my-3 d-flex flex-direction-column align-content-center">
                    <input type="number" value="{{$product->minQuantity}}" min="{{$product->minQuantity}}" class="minQuantity">
                    <span>Pedido mínimo: {{$product->minQuantity}}</span>
                </div>
                <button class="btn buyButton my-2">Comprar</button>
                <div class="d-block my-2">
                    @foreach ($product->tags as $tag)
                        <a href="{{ route('tag.show', $tag->id) }}" class="btn btn-light btn-sm">{{ $tag->name }}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection