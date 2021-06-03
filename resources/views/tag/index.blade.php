@extends('layouts.structure.index')

@section('script-scoped')

<script>
    function remover() {
            return confirm('Você deseja remover a tag?');
        }
</script>

@endsection

@section('content')
    <div class="container my-5">

        <div class='d-flex justify-content-between align-items-center'>
            <h1>Lista de Tags</h1>
            <div>
                <a href="{{ Route('tag.create') }}" class="btn btn-sm btn-primary">
                    Adicionar
                    <i class="fas fa-plus ms-1"></i>
                </a>
                <a href="{{ Route('tag.trash') }}" class='btn btn-sm btn-danger'>
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
                            <a href="{{ route('tag.show', $tag->id) }}" class="btn btn-sm btn-primary">
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('tag.edit', $tag->id) }}" class="btn btn-sm btn-warning text-white">
                                <i class="far fa-edit"></i>
                            </a>
                            <form action="{{ route('tag.destroy', $tag->id ) }}" method="POST" class="d-inline"
                                onsubmit="return remover()">
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