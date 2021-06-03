@extends('layouts.structure.index')

@section('script-scoped')
<script>
    function restaurar() {
            return confirm('Você deseja restaurar a tag?');
        }
</script>
@endsection

@section('content')
    <div class="container my-5">

        <div class='d-flex justify-content-between align-items-center'>
            <h1>Lista de tags apagados</h1>
            <a href="{{ Route('tag.index') }}" class="btn btn-sm btn-primary">
                Voltar
                <i class="fas fa-undo-alt ms-1"></i>
            </a>
        </div>

        <div class="row">
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
                        <td>{{ $tag->tagGroup->name }}</td>
                        <td>
                            <form action="{{ route('tag.restore', $tag->id ) }}" method="POST" class="d-inline"
                                onsubmit="return restaurar()">
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