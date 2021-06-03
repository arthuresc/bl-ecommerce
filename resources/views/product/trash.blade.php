@extends('layouts.structure.index')

@section('script-scoped')
    <script>
        function restaurar() {
            return confirm('Você deseja restaurar o produto?');
        }
    </script>
@endsection

@section('content')
    <div class="container my-5">

        <div class='d-flex justify-content-between align-items-center'>
            <h1>Lista de produtos apagados</h1>
            <a href="{{ Route('product.index') }}" class="btn btn-sm btn-primary">
                Voltar
                <i class="fas fa-undo-alt ms-1"></i>
            </a>
        </div>

        <div class="row">
            <table class="table table-striped w-100">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Imagem</th>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th>Preço</th>
                        <th>Quantidade</th>
                        <th>Quantidade mínima</th>
                        <th>Opções</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td><img src="{{ asset($product->mainImage) }}" width="50px"></td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->description }}</td>
                        <td>R$ {{ number_format($product->price, 2, ',', '.') }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td>{{ $product->minQuantity }}</td>
                        <td>
                            <form action="{{ route('product.restore', $product->id ) }}" method="POST"
                                class="d-inline" onsubmit="return restaurar()">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-sm btn-success">
                                    <i class="fas fa-trash-restore"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
@endsection