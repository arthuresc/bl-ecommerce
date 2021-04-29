@extends('layouts.structure.index')

@section('script-scoped')

    <script>
        function remover() {
            return confirm('Você deseja remover o produto?')
        }
    </script>

@endsection

@section('content')
    <div class="container m-5">

        <div>
            <h1>Lista de Produtos</h1>
            <a href="{{ Route('product.create') }}" class="btn btn-sm btn-primary">Cadastrar</a>
            <a href="{{ Route('product.trash') }}" class='btn btn-sm btn-danger'>Lixeira</a>
        </div>

        <div class="row">
            <table class="table table-striped w-100">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Imagem</th>
                        <th>Imagens adicionais</th>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th>Preço</th>
                        <th>Qtd</th>
                        <th>Qtd mínima</th>
                        <th>Categoria</th>
                        <th>Destaque</th>
                        <th>Opções</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td><img src="{{ asset($product->mainImage) }}" width="70px"></td>
                        <td>{{ substr_count($product->arrayImages, 'storage')}}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td>{{ $product->minQuantity }}</td>
                        <td>{{ $product->category->name }}</td>
                        <td>{{ $product->highlight }}</td>
                        <td>
                            <a href="{{ route('product.show', $product->id) }}" class="btn btn-sm btn-primary"> Visualizar </a>
                            <a href="{{ route('product.edit', $product->id) }}" class="btn btn-sm btn-warning">
                                Editar </a>
                            <form action="{{ route('product.destroy', $product->id ) }}" method="POST"
                                class="d-inline" onsubmit="return remover()">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Apagar</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection