@extends('layouts.structure.index')

@section('script-scoped')

<script>
    function remover() {
            return confirm('Você deseja remover a categoria?');
        }
</script>

@endsection

@section('content')
    <div class="container my-5">

        <div class='d-flex justify-content-between align-items-center'>
            <h1>Lista de Categorias</h1>
            <div>
                <a href="{{ Route('category.create') }}" class="btn btn-sm btn-primary">
                    Adicionar
                    <i class="fas fa-plus ms-1"></i>
                </a>
                <a href="{{ Route('category.trash') }}" class='btn btn-sm btn-danger'>
                    Lixeira
                    <i class="fas fa-recycle ms-1"></i>
                </a>
            </div>
        </div>

        <div class="row">
            <table class="table table-striped w-100">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Quantidade de produtos</th>
                        <th>Opções</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->products->count() }}</td>
                        <td>
                            <a href="{{ route('category.show', $category->id) }}" class="btn btn-sm btn-primary">
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('category.edit', $category->id) }}" class="btn btn-sm btn-warning text-white">
                                <i class="far fa-edit"></i>
                            </a>
                            <form action="{{ route('category.destroy', $category->id ) }}" method="POST"
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