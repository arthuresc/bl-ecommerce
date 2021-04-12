<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title>Brindes de luxo</title>
</head>
<body>
    @include('layouts.header.nav')
    <main>
        <div class="container m-5">
            <h1>Editar categoria</h1>
            <form method="post" action="{{ route('category.update', $category->id) }}" enctype="multipart/form-data" class="m-3">
                @CSRF
                @method('PATCH')
                <div class="row form-group mb-2">
                    <label class="form-label" for="name">Nome (requerido)</label>
                    <input type="text" name="name" id="name" placeholder="Nome da categoria" class="form-control" value="{{ $category->name }}" required>
                </div>
                <div class="row form-group mb-2">
                    <label class="form-label" for="description">Descrição (opcional)</label>
                    <input type="text" name="description" id="description" placeholder="Descrição da categoria" class="form-control" value="{{ $category->description }}">
                </div>
                </div>
                <div class="row col-2">
                    <button type="submit" class="btn btn-md btn-success mt-3"> Salvar </button>
                </div>
            </form>
        </div>q
    </main>
</body>
</html>