<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script>
        function remover() {
            return confirm('Você deseja remover a categoria?')
        }
    </script>
    <title>Brindes de luxo</title>
</head>
<body>
    @include('layouts.header.nav')
    <main>
        <div class="container m-5">
            @if (session()->has('success'))
                <div class="alert alert-success" role="alert">
                    {{ session()->get('success') }}
                </div>
            @endif

            <div class="mx-5">
                <h1>Lista de Categorias</h1>
                <a href="{{ Route('category.create') }}" class="btn btn-sm btn-primary">Cadastrar</a>
                <a href="{{ Route('category.trash') }}" class='btn btn-sm btn-danger'>Lixeira</a>
            </div>

            <div class="row mx-5">
                <table class="table table-striped w-100">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Opções</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }} ({{ $category->products->count() }})</td>
                            <td>
                                <a href="#" class="btn btn-sm btn-primary"> Visualizar </a>
                                <a href="{{ route('category.edit', $category->id) }}" class="btn btn-sm btn-warning"> Editar </a>
                                <form action="{{ route('category.destroy', $category->id ) }}" method="POST" class="d-inline" onsubmit="return remover()">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Apagar</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </main>
</body>
</html>