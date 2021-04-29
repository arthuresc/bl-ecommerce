@extends('layouts.structure.index')

@section('content')
    <div class="container m-5">
        <h1>Editar categoria</h1>
        <form method="post" action="{{ route('category.update', $category->id) }}" enctype="multipart/form-data"
            class="m-3">
            @CSRF
            @method('PATCH')
            <div class="row form-group mb-2">
                <label class="form-label" for="name">Nome (requerido)</label>
                <input type="text" name="name" id="name" placeholder="Nome da categoria" class="form-control"
                    value="{{ $category->name }}" required>
            </div>
            <div class="row col-2">
                <button type="submit" class="btn btn-md btn-success mt-3"> Salvar </button>
            </div>
        </form>
    </div>
@endsection