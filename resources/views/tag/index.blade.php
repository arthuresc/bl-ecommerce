@extends('layouts.structure.index')

@section('script-scoped')

<script>
    function remover() {
            return confirm('Você deseja remover a tag?')
        }
</script>

@endsection

@section('content')
    <div class="container m-5">

        <div class="mx-5">
            <h1>Lista de tags</h1>
            <a href="{{ Route('tag.create') }}" class="btn btn-sm btn-primary">Cadastrar</a>
            <a href="{{ Route('tag.trash') }}" class='btn btn-sm btn-danger'>Lixeira</a>
        </div>

        <div class="row mx-5">
            <table class="table table-striped w-100">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Grupo da Tag</th>
                        <th>Opções</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tags as $tag)
                    <tr>
                        <td>{{ $tag->id }}</td>
                        <td>{{ $tag->name }}</td>
                        <td>{{ $tag->taggroup->name }}</td>
                        <td>
                            <a href="{{ route('tag.show', $tag->id) }}" class="btn btn-sm btn-primary"> Visualizar </a>
                            <a href="{{ route('tag.edit', $tag->id) }}" class="btn btn-sm btn-warning"> Editar </a>
                            <form action="{{ route('tag.destroy', $tag->id ) }}" method="POST" class="d-inline"
                                onsubmit="return remover()">
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