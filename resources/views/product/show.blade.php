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
        }
        .buyButton:hover {
            background-color: black !important;
            color: #fff !important;
        }
        .mainImage {
            height: 450px;
            width: 100%;
            background-position: center center;
            background-repeat: no-repeat;
            object-fit: cover;
        }
        .arrayImagesBox {
            height: 90px;
            width: 100%;
            background-position: center center;
            background-repeat: no-repeat;
            object-fit: cover;
            padding: 0 3px 3px 0;
        }
        .arrayImagesBox:last-of-type {
            padding-bottom: 0px;
        }

        input[type=radio] {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
        }

        #Padrão {
            display: none
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
                <div class="col-2 flex-direction-column">
                    @foreach (array_slice(json_decode($product->arrayImages), 0, 5) as $image) 
                        <img src="{{ asset($image) }}" class="arrayImagesBox"/>
                    @endforeach
                </div>
                <div class="col-10">
                    <img src="{{ asset($product->mainImage) }}" class="mainImage shadow" />
                </div>
            </div>
            <div class="col-5 my-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a class="breadcrumbLink" href="{{ url('/') }}">
                                <i class="fas fa-home text-dark"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item"><a class="breadcrumbLink" href="{{ route('category.show', $product->category) }}">{{ $product->category->name }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $product->name }}</li>
                    </ol>
                </nav>
                <h2 class="my-2">{{ $product->name }}</h2>
                <span class="h5 my-4">R$: {{ number_format($product->price, 2, ',', '.') }}</span>
                <p class="my-4">{{ $product->description }}</p>
                <form method='POST' action='{{ route('cart.add', $product) }}'>
                    @csrf
                    <h3 class="my-2 h6">Deseja alterar a cor?</h3>
                    <div class="d-block my-2">
                        @foreach ($colorTags as $tag)
                            <input type="radio" name="tag" id="{{ $tag->name }}" value="{{ $tag->id }}" class="btn colorButton">
                        @endforeach
                    </div>
                    <div class="my-3 d-flex flex-direction-column align-content-center">
                        <input type="number" name="quantity" value="{{$product->minQuantity}}" min="{{$product->minQuantity}}" class="minQuantity">
                        <span>Pedido mínimo: {{$product->minQuantity}}</span>
                    </div>

                    <button class="btn buyButton my-2 bg-orange">Comprar</button>
                </form>
                <div class="d-block my-2">
                    @foreach ($product->tags as $tag)
                        <a href="{{ route('tag.show', $tag->id) }}" class="btn btn-light btn-sm shadow-sm">{{ $tag->name }}</a>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
@endsection