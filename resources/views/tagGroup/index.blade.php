@extends('layouts.structure.index')

@section('script-scoped')

<script>
    function remover() {
            return confirm('Você deseja remover o grupos de tags?')
        }
</script>

@section('content')
    <div class="container my-5">

        <div class='d-flex justify-content-between align-items-center'>
            <h1>Lista de Grupos de Tags</h1>
            <div>
                <a href="{{ Route('tagGroup.create') }}" class="btn btn-sm btn-primary">
                    Adicionar
                    <i class="fas fa-plus ms-1"></i>
                </a>
                <a href="{{ Route('tagGroup.trash') }}" class='btn btn-sm btn-danger'>
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
                        <th>Opções</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tagsGroups as $tagGroup)
                    <tr>
                        <td>{{ $tagGroup->id }}</td>
                        <td>{{ $tagGroup->name }}</td>
                        <td>
                            <a href="{{ route('tagGroup.edit', $tagGroup->id) }}" class="btn btn-sm btn-warning text-white">
                                <i class="far fa-edit"></i>    
                            </a>
                            <form action="{{ route('tagGroup.destroy', $tagGroup->id ) }}" method="POST"
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