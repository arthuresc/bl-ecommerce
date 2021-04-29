@extends('layouts.structure.index')

@section('content')
    <div class="container m-5">
        <h1>Editar tag</h1>
        <form method="post" action="{{ route('tag.update', $tag->id) }}" class="m-3">
            @CSRF
            @method('PATCH')

            <div class="row form-group mb-2">
                <label class="form-label" for="tag_group_id">Selecionar grupo da tag</label>

                <select class="form-control" name="tag_group_id" id="tag-group" required>
                    @foreach ($tagsGroups as $tagGroup)
                    <option value="{{ $tagGroup->id }}" @if($tagGroup->id === $tag->tag_group_id)
                        selected
                        @endif
                        >
                        {{ $tagGroup->name }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="row form-group mb-2">
                <label class="form-label" for="name">Nome</label>
                <input type="text" name="name" id="name" placeholder="Nome da tag" class="form-control"
                    value='{{ $tag->name }}' required>
            </div>

            <div class="row col-2 mt-4">
                <button type="submit" class="btn btn-lg btn-success mt-2">Salvar</button>
            </div>
        </form>
    </div>
@endsection