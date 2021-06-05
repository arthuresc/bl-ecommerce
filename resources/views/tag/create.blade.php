@extends('layouts.structure.index')

@section('content')
    <div class="container m-5">
        <div class='d-flex justify-content-between align-items-center'>
            <h1>Cadastrar Tag</h1>
            <a href="{{ Route('tag.index') }}" class="btn btn-sm btn-primary">
                Voltar
                <i class="fas fa-undo-alt ms-1"></i>
            </a>
        </div>
        <span class="text-muted">* Obrigatório</span>
        <form method="post" action="{{ Route('tag.store') }}" class="mt-3 mx-3 row" id="tagGroupForm">
            @CSRF
            <div class="col-12 col-md-6 form-group mb-2">
                <label class="form-label" for="name">Adicionar novo grupo de tags</label>

                <div class="p-0 d-flex">
                    <input type="text" name="name" id="tagGroupFormName" placeholder="Nome do novo grupo de tags"
                        class="form-control align-self-center" form="tagGroupForm" required>
                    <button type="submit" class="btn btn-md btn-primary mx-2 align-self-center" name="addNewTagGroup">
                        Adicionar
                    </button>
                </div>

            </div>
        </form>


        <form method="post" action="{{ Route('tag.store') }}" class="m-3 row" id="tagForm">
            @CSRF

            <div class="col-12 col-md-6 form-group mb-2">
                <label class="form-label" for="tag_group_id">Selecionar grupo da tag *</label>

                <select class="form-control" name="tag_group_id" id="tag-group" form="tagForm" required>
                    @foreach ($tagsGroups as $tagGroup)
                    <option value="{{ $tagGroup->id }}">{{ $tagGroup->name }} </option>
                    @endforeach
                </select>

            </div>

            <div class="col-12 col-md-6 form-group mb-2">
                <label class="form-label" for="name">Nome *</label>

                <input type="text" name="name" id="name" placeholder="Nome da tag" class="form-control" form="tagForm"
                    required>
            </div>

            <div class="col-12 mt-4">
                <button type="submit" class="btn btn-md btn-success mt-2" name="addNewTag">
                    Salvar
                    <i class="fas fa-save ms-1"></i>
                </button>
            </div>

        </form>
    </div>
@endsection