@extends('layouts.structure.index')

@section('script-scoped')

    <script>
        function remover() {
            return confirm('Você deseja remover o produto?');
        }
    </script>

@endsection

@section('content')
    <div class="container my-5">

        <div class='d-flex justify-content-between align-items-center'>
            <h1>Lista de Produtos</h1>
            <div>
                <a href="{{ Route('product.create') }}" class="btn btn-sm btn-primary">
                    Adicionar
                    <i class="fas fa-plus ms-1"></i>
                </a>
                <a href="{{ Route('product.trash') }}" class='btn btn-sm btn-danger'>
                    Lixeira
                    <i class="fas fa-recycle ms-1"></i>
                </a>
            </div>
        </div>

        <div class="row">
            <table class="table table-striped w-100 align-middle">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Imagem</th>
                        <th>+ imagens</th>
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
                        <td>{{ Str::limit($product->description, 15) }}</td>
                        <td>R$ {{ number_format($product->price, 2, ',', '.') }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td>{{ $product->minQuantity }}</td>
                        <td>{{ $product->category->name }}</td>
                        <td>{{ ($product->highlight === 1) ? 'Sim' : 'Não' }}</td>
                        <td>
                            <a href="{{ route('product.show', $product->id) }}" class="btn btn-sm btn-primary">
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('product.edit', $product->id) }}" class="btn btn-sm bg-warning text-white">
                                <i class="far fa-edit"></i>
                            </a>
                            <form action="{{ route('product.destroy', $product->id ) }}" method="POST"
                                class="d-inline" onsubmit="return remover()">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">
                                    <i class="far fa-trash-alt"></i>
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