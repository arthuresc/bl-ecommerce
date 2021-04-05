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
            <h1>Editar grupo de tags</h1>
            <form method="post" action="{{ route('tagGroup.update', $tagGroup->id) }}" class="m-3">
                @CSRF
                @method('PATCH')
                <div class="row form-group mb-2">
                    <label class="form-label" for="name">Nome</label>
                    <input type="text" name="name" id="name" placeholder="Nome da tag" class="form-control" value='{{ $tagGroup->name }}' required>
                </div>

                <div class="row col-2 mt-4">
                    <button type="submit" class="btn btn-lg btn-success mt-2">Salvar</button>
                </div>
            </form>
        </div>
    </main>
</body>
</html>