@extends('layouts.structure.index')

@section('script-scoped')

<script>
    function remover() {
            return confirm('Você deseja remover o grupos de tags?')
        }
</script>

@section('content')
    <div class="container m-5">

        <div class="mx-5">
            <h1>Lista de grupos de tags</h1>
            <a href="{{ Route('tagGroup.create') }}" class="btn btn-sm btn-primary">Cadastrar</a>
            <a href="{{ Route('tagGroup.trash') }}" class='btn btn-sm btn-danger'>Lixeira</a>
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
                    @foreach($tagsGroups as $tagGroup)
                    <tr>
                        <td>{{ $tagGroup->id }}</td>
                        <td>{{ $tagGroup->name }}</td>
                        <td>
                            <a href="#" class="btn btn-sm btn-primary"> Visualizar </a>
                            <a href="{{ route('tagGroup.edit', $tagGroup->id) }}" class="btn btn-sm btn-warning">
                                Editar </a>
                            <form action="{{ route('tagGroup.destroy', $tagGroup->id ) }}" method="POST"
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