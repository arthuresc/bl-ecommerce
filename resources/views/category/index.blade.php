@extends('layouts.structure.index')

@section('script-scoped')

<script>
    function remover() {
            return confirm('Você deseja remover a categoria?')
        }
</script>

@endsection

@section('content')
    <div class="container m-5">

        <div class="mx-5">
            <h1>Lista de Categorias</h1>
            <a href="{{ Route('category.create') }}" class="btn btn-sm btn-primary">Cadastrar</a>
            <a href="{{ Route('category.trash') }}" class='btn btn-sm btn-danger'>Lixeira</a>
        </div>

        <div class="row mx-5">
            <table class="table table-striped w-100">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Opções</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }} ({{ $category->products->count() }})</td>
                        <td>
                            <a href="#" class="btn btn-sm btn-primary"> Visualizar </a>
                            <a href="{{ route('category.edit', $category->id) }}" class="btn btn-sm btn-warning">
                                Editar </a>
                            <form action="{{ route('category.destroy', $category->id ) }}" method="POST"
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