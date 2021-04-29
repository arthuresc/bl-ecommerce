@extends('layouts.structure.index')

@section('script-scoped')
<script>
    function restaurar() {
            return confirm('Você deseja restaurar o grupo de tags?')
        }
</script>
@endsection

@section('content')
    <div class="container m-5">
        <div>
            <h1 class="mx-5">Lista de grupos de tags apagados</h1>
            <a href="{{ Route('tagGroup.index') }}" class="btn btn-sm btn-primary mx-5">Voltar</a>
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
                            <form action="{{ route('tagGroup.restore', $tagGroup->id ) }}" method="POST"
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