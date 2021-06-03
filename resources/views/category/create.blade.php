@extends('layouts.structure.index')

@section('content')
    <div class="container m-5">
        <div class='d-flex justify-content-between align-items-center'>
            <h1>Cadastrar Categoria</h1>
            <a href="{{ Route('category.index') }}" class="btn btn-sm btn-primary">
                Voltar
                <i class="fas fa-undo-alt ms-1"></i>
            </a>
        </div>
        <span class="text-muted">* Obrigatório</span>
        <form method="post" action="{{ Route('category.store') }}" enctype="multipart/form-data" class="m-3 row">
            @CSRF
            <div class="col-12 col-md-6 form-group mb-2">
                <label class="form-label" for="name">Nome *</label>
                <input type="text" name="name" id="name" placeholder="Nome do produto" class="form-control"
                    required>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-md btn-success mt-3">
                    Salvar
                    <i class="fas fa-save ms-1"></i>
                </button>
            </div>
        </form>
    </div>
@endsection