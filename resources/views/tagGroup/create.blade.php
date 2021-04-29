@extends('layouts.structure.index')

@section('content')
    <div class="container m-5">
        <h1>Cadastrar grupo de tags</h1>
        <form method="post" action="{{ Route("tagGroup.store") }}" class="m-3">
            @CSRF

            <div class="row form-group mb-2">
                <label class="form-label" for="name">Nome</label>
                <input type="text" name="name" id="name" placeholder="Nome do grupo de tags" class="form-control"
                    required>
            </div>

            <div class="row col-2 mt-4">
                <button type="submit" class="btn btn-lg btn-success mt-2">Salvar</button>
            </div>
        </form>
    </div>
@endsection