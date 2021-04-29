@extends('layouts.structure.index')

@section('content')
    <div class="container m-5">
        <h1>Cadastrar categoria</h1>
        <form method="post" action="{{ Route('category.store') }}" enctype="multipart/form-data" class="m-3">
            @CSRF
            <div class="row form-group mb-2">
                <label class="form-label" for="name">Nome (requerido)</label>
                <input type="text" name="name" id="name" placeholder="Nome do produto" class="form-control"
                    required>
            </div>
            <div class="row col-2">
                <button type="submit" class="btn btn-md btn-success mt-3"> Salvar </button>
            </div>
        </form>
    </div>
@endsection