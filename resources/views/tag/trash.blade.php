@extends('layouts.structure.index')

@section('script-scoped')
<script>
    function restaurar() {
            return confirm('Você deseja restaurar a tag?');
        }
</script>
@endsection

@section('content')
    <div class="container m-5">

        <div>
            <h1 class="mx-5">Lista de tags apagadas</h1>
            <a href="{{ Route('tag.index') }}" class="btn btn-sm btn-primary mx-5">Voltar</a>
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
                        <td>{{ $tag->tagGroup->name }}</td>
                        <td>
                            <form action="{{ route('tag.restore', $tag->id ) }}" method="POST" class="d-inline"
                                onsubmit="return restaurar()">
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