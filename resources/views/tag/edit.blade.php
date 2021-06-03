@extends('layouts.structure.index')

@section('content')
    <div class="container m-5">
        <div class='d-flex justify-content-between align-items-center'>
            <h1>Editar Tag</h1>
            <a href="{{ Route('tag.index') }}" class="btn btn-sm btn-primary">
                Voltar
                <i class="fas fa-undo-alt ms-1"></i>
            </a>
        </div>
        <span class="text-muted">* Obrigatório</span>
        <form method="post" action="{{ route('tag.update', $tag->id) }}" class="m-3 row">
            @CSRF
            @method('PATCH')

            <div class="col-12 col-md-6 form-group mb-2">
                <label class="form-label" for="tag_group_id">Selecionar grupo da tag *</label>

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

            <div class="col-12 col-md-6 form-group mb-2">
                <label class="form-label" for="name">Nome *</label>
                <input type="text" name="name" id="name" placeholder="Nome da tag" class="form-control"
                    value='{{ $tag->name }}' required>
            </div>

            <div class="col-12 mt-4">
                <button type="submit" class="btn btn-md btn-success mt-2">
                    Salvar
                    <i class="fas fa-save ms-1"></i>
                </button>
            </div>
        </form>
    </div>
@endsection