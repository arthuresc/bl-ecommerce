@extends('layouts.structure.index')

@section('content')
    <div class="container m-5">
        <h1>Editar grupo de tags</h1>
        <span class="text-muted">* Obrigatório</span>
        <form method="post" action="{{ route('tagGroup.update', $tagGroup->id) }}" class="m-3">
            @CSRF
            @method('PATCH')
            <div class="col-12 col-md-6 form-group mb-2">
                <label class="form-label" for="name">Nome *</label>
                <input type="text" name="name" id="name" placeholder="Nome da tag" class="form-control"
                    value='{{ $tagGroup->name }}' required>
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