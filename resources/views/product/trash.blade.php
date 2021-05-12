@extends('layouts.structure.index')

@section('script-scoped')
    <script>
        function restaurar() {
            return confirm('Você deseja restaurar o produto?');
        }
    </script>
@endsection

@section('content')
    <div class="container m-5">

        <div>
            <h1>Lista de produtos apagados</h1>
            <a href="{{ Route('product.index') }}" class="btn btn-sm btn-primary">Voltar</a>
        </div>

        <div class="row">
            <table class="table table-striped w-100">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Imagem</th>
                        <th>Qtd imagens</th>
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
                        <td>{{ substr_count($product->arrayImages, 'storage')}}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td>{{ $product->minQuantity }}</td>
                        <td>
                            <form action="{{ route('product.restore', $product->id ) }}" method="POST"
                                class="d-inline" onsubmit="return restaurar()">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-sm btn-success">Restaurar</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
@endsection